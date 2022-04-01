<?php

namespace FluxEco\SourceDownloader\Adapters\Api;

use FluxEco\SourceDownloader\{Adapters, Core\Ports};

class SourceDownloaderApi
{
    private Ports\Service $service;

    private function __construct(Ports\Service $service)
    {
        $this->service = $service;
    }

    public static function new(?string $sourceListFile = null, ?string $volumePath = null, ?bool $gitGetFullClone = null) : self
    {
        $apiGatewayService = Ports\Service::new(Adapters\Configs\Outbounds::new($sourceListFile, $volumePath, $gitGetFullClone));
        return new self($apiGatewayService);
    }

    public function downloadSources() {
        $this->service->downloadSources();
    }
}