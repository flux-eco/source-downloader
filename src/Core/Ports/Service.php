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

    public function downloadSources()
    {
        $sourceList = $this->outbounds->getSourceList();

        foreach ($sourceList as $source) {
            $process = Processes\DownloadProcess::new($this->outbounds);
            $command = Processes\DownloadCommand::fromArray($source);
            $process->process($command);
        }

    }
}