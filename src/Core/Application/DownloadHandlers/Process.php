<?php

namespace FluxEco\SourceDownloader\Core\Application\DownloadHandlers;

use FluxEco\SourceDownloader\Core\Application\Processes\DownloadCommand;

interface Process
{
    public function handle(DownloadCommand $command) : void;

    public function process(DownloadCommand $command) : void;
}