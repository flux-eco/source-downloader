<?php

namespace FluxEco\SourceDownloader\Adapters\Configs;

use FluxEco\SourceDownloader\{Adapters, Core\Ports};

class Outbounds implements Ports\Configs\Outbounds
{

    private function __construct()
    {

    }

    public static function new() : self
    {
        return new self();
    }

    public function getShellExecutorClient() : Ports\ShellExecutor\ShellExecutorClient
    {
        return Adapters\ShellExecutor\ShellExecutorClient::new();
    }

    public function getSourceList(?string $sourceListFile, ?string $volumePath) : array
    {
        if ($sourceListFile !== null) {
            $sources = yaml_parse(file_get_contents($sourceListFile));
            $transformedSources = [];
            foreach ($sources as $source) {
                $source['localPath'] = $volumePath . $source['localPath'];
                $transformedSources[] = $source;
            }
            return $transformedSources;
        }

        return yaml_parse(file_get_contents(getenv(Env::SOURCE_DOWNLOADER_SOURCE_LIST_FILE)));
    }
}
