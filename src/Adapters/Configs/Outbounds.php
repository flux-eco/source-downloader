<?php

namespace FluxEco\SourceDownloader\Adapters\Configs;

use FluxEco\SourceDownloader\{Adapters, Core\Ports};

class Outbounds implements Ports\Configs\Outbounds
{
    private string $sourceListFile;
    private string $volumePath;
    private bool $gitGetFullClone;

    private function __construct(string $sourceListFile, string $volumePath, bool $gitGetFullClone)
    {
        $this->sourceListFile = $sourceListFile;
        $this->volumePath = $volumePath;
        $this->gitGetFullClone = $gitGetFullClone;
    }

    public static function new(
        ?string $sourceListFile = null,
        ?string $volumePath = null,
        ?bool $gitGetFullClone = null
    ) : self {
        if (is_null($sourceListFile) === true) {
            $sourceListFile = getenv(Env::SOURCE_LIST_FILE);
        }
        if (is_null($volumePath) === true) {
            $volumePath = getenv(Env::VOLUME_PATH);
        }
        if (is_null($gitGetFullClone) === true) {
            $gitGetFullClone = getenv(Env::GIT_FULL_CLONE);
        }

        return new self($sourceListFile, $volumePath, $gitGetFullClone);
    }

    public function getShellExecutorClient() : Ports\ShellExecutor\ShellExecutorClient
    {
        return Adapters\ShellExecutor\ShellExecutorClient::new();
    }

    public function getGitFullClone() : bool
    {
        return $this->gitGetFullClone;
    }

    public function getSourceList() : array
    {
        $sources = yaml_parse(file_get_contents($this->sourceListFile));
        $transformedSources = [];
        foreach ($sources as $source) {
            $source['directoryPath'] = $this->volumePath . $source['directoryPath'];
            $transformedSources[] = $source;
        }
        return $transformedSources;
    }
}
