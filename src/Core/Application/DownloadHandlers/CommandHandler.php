<?php

namespace FluxEco\SourceDownloader\Core\Application\DownloadHandlers;

use FluxEco\SourceDownloader\Core\{Ports};

interface CommandHandler
{
    public static function new(Ports\Configs\Outbounds $outbounds, Process $process) : self;
    public function handle(Command $command) : void;
}