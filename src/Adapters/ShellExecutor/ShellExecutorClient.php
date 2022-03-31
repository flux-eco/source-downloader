<?php

namespace FluxEco\SourceDownloader\Adapters\ShellExecutor;

use  FluxEco\SourceDownloader\Core\Ports;
use FluxEco\ShellExecutor\Adapters\Api\ShellExecutorApi;

class ShellExecutorClient implements Ports\ShellExecutor\ShellExecutorClient
{
    private function __construct()
    {

    }

    public static function new() : self
    {
        return new self();
    }

    public function execute(array $commandQueue) : void
    {
        ShellExecutorApi::new()->execute($commandQueue);
    }
}