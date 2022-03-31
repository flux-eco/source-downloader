<?php

namespace FluxEco\SourceDownloader\Core\Ports\Configs;

use  FluxEco\SourceDownloader\Core\Ports;

interface Outbounds
{
    public function getShellExecutorClient() : Ports\ShellExecutor\ShellExecutorClient;

    public function getSourceList(?string $sourceListFile, ?string $volumePath) : array;
}