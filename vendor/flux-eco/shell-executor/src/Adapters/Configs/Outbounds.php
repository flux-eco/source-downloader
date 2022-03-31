<?php

namespace FluxEco\ShellExecutor\Adapters\Configs;

use FluxEco\ShellExecutor\{Adapters, Core\Ports};

class Outbounds implements Ports\Configs\Outbounds
{

    private function __construct()
    {

    }

    public static function new() : self
    {
        return new self();
    }

    public function getShellClient() : Ports\Shell\ShellClient
    {
        return Adapters\Shell\ShellClient::new();
    }
}