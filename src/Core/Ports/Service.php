<?php

namespace FluxEco\SourceDownloader\Core\Ports;

use FluxEco\SourceDownloader\Core\Application\Processes;

class Service
{
    private Configs\Outbounds $outbounds;

    private function __construct(Configs\Outbounds $outbounds)
    {
        $this->outbounds = $outbounds;
    }

    public static function new(Configs\Outbounds $outbounds) : self
    {
        return new self($outbounds);
    }

    public function downloadSources(string $sourceListFile = null, ?string $volumePath = null)
    {
        $sourceList = $this->outbounds->getSourceList($sourceListFile, $volumePath);

        foreach ($sourceList as $source) {
            $process = Processes\DownloadProcess::new($this->outbounds);
            $command = Processes\DownloadCommand::fromArray($source);
            $process->process($command);
        }

    }
}