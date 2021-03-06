<?php

namespace FluxEco\SourceDownloader\Core\Application\DownloadHandlers;

use FluxEco\SourceDownloader\Core\{Domain\Models, Ports};

class GitCloneStateCommandHandler implements CommandHandler
{
    private Ports\ShellExecutor\ShellExecutorClient $shellExecutorClient;
    private bool $gitFullClone;
    private Process $process;

    private function __construct(
        Ports\ShellExecutor\ShellExecutorClient $shellExecutorClient,
        bool $gitFullClone,
        Process $process
    ) {
        $this->shellExecutorClient = $shellExecutorClient;
        $this->gitFullClone = $gitFullClone;
        $this->process = $process;
    }

    public static function new(Ports\Configs\Outbounds $outbounds, Process $process) : self
    {
        return new self($outbounds->getShellExecutorClient(), $outbounds->getGitFullClone(), $process);
    }

    public function handle(Command $command) : void
    {
        if ($command->getSourceType() !== Models\SourceTypeEnum::GIT || $this->gitFullClone === true) {
            $this->process->process($command);
            return;
        }

        $createDirectory = 'mkdir -p ' . $command->getDirectoryPath();
        if(is_dir($command->getDirectoryPath().'/'.$command->getDirectoryName())) {
            $createDirectory = 'rm -r ' . $command->getDirectoryPath().'/'.$command->getDirectoryName().' && '.$createDirectory;
        }
        $cdDirectory = 'cd ' . $command->getDirectoryPath();
        $cloneRepository = 'git clone --depth 1 --branch '.$command->getTag() .' '. $command->getUrl().' '.$command->getDirectoryName();

        $this->shellExecutorClient->execute([$createDirectory, $cdDirectory, $cloneRepository]);
    }
}