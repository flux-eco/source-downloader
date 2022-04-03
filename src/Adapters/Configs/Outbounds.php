<?php

namespace FluxEco\SourceDownloader\Adapters\Configs;

use FluxEco\SourceDownloader\{Adapters, Core\Ports};

class Outbounds implements Ports\Configs\Outbounds
{
    private bool $gitGetFullClone;

    private function __construct(bool $gitGetFullClone)
    {
        $this->gitGetFullClone = $gitGetFullClone;
    }

    public static function new(bool $gitGetFullClone) : self {
        return new self($gitGetFullClone);
    }

    public function getShellExecutorClient() : Ports\ShellExecutor\ShellExecutorClient
    {
        return Adapters\ShellExecutor\ShellExecutorClient::new();
    }

    public function getGitFullClone() : bool
    {
        return $this->gitGetFullClone;
    }

    public function getSourceList(string $sourceListFile, ?string $volumePath = null) : array
    {
        $sources = yaml_parse(file_get_contents($sourceListFile));
        $transformedSources = [];
        foreach ($sources as $source) {
            $source['directoryPath'] = $volumePath . $source['directoryPath'];
            $transformedSources[] = $source;
        }
        return $transformedSources;
    }
}
