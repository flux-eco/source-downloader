<?php

namespace FluxEco\SourceDownloader\Core\Application\DownloadHandlers;

use FluxEco\SourceDownloader\Core\{Domain\Models, Ports};

class DownloadTarGzHandler
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
        if ($command->getSourceType() !== Models\SourceTypeEnum::TAR_GZ) {
            $this->process->process($command);
            return;
        }

        $createDirectory = 'mkdir -p ' . $command->getDirectoryPath() . '/' . $command->getDirectoryName();
        $cdDirectory = 'cd ' . $command->getDirectoryPath() . '/' . $command->getDirectoryName();
        $curlUrl = 'curl -SL ' . $command->getUrl() . ' | tar -xz --strip-components=1';

        $this->shellExecutorClient->execute([$createDirectory, $cdDirectory, $curlUrl]);
    }
}