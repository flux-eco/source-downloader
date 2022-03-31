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

    public static function new() : self
    {
        $apiGatewayService = Ports\Service::new(Adapters\Configs\Outbounds::new());
        return new self($apiGatewayService);
    }

    public function downloadSources(?string $sourceListFile = null, ?string $volumePath = null) {
        $this->service->downloadSources($sourceListFile, $volumePath);
    }
}