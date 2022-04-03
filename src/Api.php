<?php

namespace FluxEco\SourceDownloader;

use FluxEco\SourceDownloader\{Adapters, Core\Ports};

class Api
{
    private Ports\Service $service;

    private function __construct(Ports\Service $service)
    {
        $this->service = $service;
    }

    public static function new(bool $gitGetFullClone = true) : self
    {
        $apiGatewayService = Ports\Service::new(Adapters\Configs\Outbounds::new($gitGetFullClone));
        return new self($apiGatewayService);
    }

    public function downloadSources(string $sourceListFile = null, ?string $volumePath = null) {
        $this->service->downloadSources($sourceListFile, $volumePath);
    }
}