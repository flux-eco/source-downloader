<?php

namespace FluxEco\SourceDownloader\Core\Application\Processes;

use FluxEco\SourceDownloader\Core\Application\DownloadHandlers;

class DownloadCommand implements DownloadHandlers\Command
{
    private string $sourceType;
    private string $url;
    private string $directoryPath;
    private string $directoryName;
    private string $tag;

    private function __construct(
        string $sourceType,
        string $url,
        string $directoryPath,
        string $directoryName,
        string $tag
    ) {
        $this->sourceType = $sourceType;
        $this->url = $url;
        $this->directoryPath = $directoryPath;
        $this->directoryName = $directoryName;
        $this->tag = $tag;
    }

    public static function fromArray(array $source) : self
    {
        $tag = '';
        if(key_exists('tag', $source)) {
            $tag = $source['tag'];
        }

        return new self(
            $source['sourceType'],
            $source['url'],
            $source['directoryPath'],
            $source['directoryName'],
            $tag
        );
    }

    public function getSourceType() : string
    {
        return $this->sourceType;
    }

    public function getUrl() : string
    {
        return $this->url;
    }

    public function getdirectoryPath() : string
    {
        return $this->directoryPath;
    }

    public function getDirectoryName() : string
    {
        return $this->directoryName;
    }

    public function getTag() : string
    {
        return $this->tag;
    }
}