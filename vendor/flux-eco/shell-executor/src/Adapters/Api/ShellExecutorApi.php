<?php

namespace FluxEco\ShellExecutor\Adapters\Api;

use FluxEco\ShellExecutor\{Adapters\Configs,Core\Ports};

class ShellExecutorApi
{
    private Ports\ShellExecutorService $service;

    private function __construct(Ports\ShellExecutorService $service)
    {
        $this->service = $service;
    }

    public static function new() : self
    {

        $service = Ports\ShellExecutorService::new(Configs\Outbounds::new());
        return new self($service);
    }

    final public function execute(array $commandQueue) : void
    {
        $this->service->execute($commandQueue);
    }

}