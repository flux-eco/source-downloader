<?php

namespace FluxEco\SourceDownloader\Core\Application\Processes;

use FluxEco\SourceDownloader\Core\Application\DownloadHandlers;

class DownloadCommand implements DownloadHandlers\Command
{
    private string $sourceType;
    private string $path;
    private string $url;

    private function __construct(
        string $sourceType,
        string $path,
        string $url
    ) {
        $this->sourceType = $sourceType;
        $this->path = $path;
        $this->url = $url;
    }

    public static function fromArray(array $source) : self
    {
        return new self(
            $source['sourceType'],
            $source['localPath'],
            $source['url']
        );
    }

    public function getSourceType() : string
    {
        return $this->sourceType;
    }

    public function getPath() : string
    {
        return $this->path;
    }

    public function getUrl() : string
    {
        return $this->url;
    }
}