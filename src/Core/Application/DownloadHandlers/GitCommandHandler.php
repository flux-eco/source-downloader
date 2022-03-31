<?php

namespace FluxEco\SourceDownloader\Core\Application\DownloadHandlers;

use FluxEco\SourceDownloader\Core\{Domain\Models, Ports};

class GitCommandHandler implements CommandHandler
{
    private Ports\ShellExecutor\ShellExecutorClient $shellExecutorClient;
    private Process $process;

    private function __construct(Ports\ShellExecutor\ShellExecutorClient $shellExecutorClient, Process $process)
    {
        $this->shellExecutorClient = $shellExecutorClient;
        $this->process = $process;
    }

    public static function new(Ports\Configs\Outbounds $outbounds, Process $process) : self
    {
        return new self($outbounds->getShellExecutorClient(), $process);
    }

    public function handle(Command $command) : void
    {
        if ($command->getSourceType() !== Models\SourceTypeEnum::GIT) {
            $this->process->process($command);
            return;
        }

        $createDirectory = 'mkdir -p ' . $command->getPath();
        $cdDirectory = 'cd ' . $command->getPath();
        $cloneRepository = 'git clone ' . $command->getUrl();

        $this->shellExecutorClient->execute([$createDirectory, $cdDirectory, $cloneRepository]);
    }
}