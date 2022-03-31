<?php

namespace  FluxEco\ShellExecutor\Core\Ports\Configs;
use  FluxEco\ShellExecutor\Core\Ports;

interface Outbounds
{
    public function getShellClient(): Ports\Shell\ShellClient;
}