<?php

namespace FluxEco\SourceDownloader\Core\Application\DownloadHandlers;

use FluxEco\SourceDownloader\Core\{Domain\Models, Ports};

class GitCloneCommandHandler implements CommandHandler
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
        if ($command->getSourceType() !== Models\SourceTypeEnum::GIT || $this->gitFullClone === false) {
            $this->process->process($command);
            return;
        }

        $createDirectory = 'mkdir -p ' . $command->getDirectoryPath();
        if(is_dir($command->getDirectoryPath())) {
            $createDirectory = 'rm -r ' . $command->getDirectoryPath().' && '.$createDirectory;
        }
        $cdDirectory = 'cd ' . $command->getDirectoryPath();
        $cloneRepository = 'git clone --branch ' . $command->getTag() . ' ' . $command->getUrl() . ' ' . $command->getDirectoryName();

        $this->shellExecutorClient->execute([$createDirectory, $cdDirectory, $cloneRepository]);
    }
}