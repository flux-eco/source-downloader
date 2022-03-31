<?php

namespace FluxEco\SourceDownloader\Core\Ports\ShellExecutor;

use  FluxEco\SourceDownloader\Core\Ports;

interface ShellExecutorClient
{
    public function execute(array $commandQueue) : void;
}