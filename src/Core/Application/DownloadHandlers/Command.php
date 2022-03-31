<?php

namespace FluxEco\SourceDownloader\Core\Application\DownloadHandlers;

interface Command
{
    public function getSourceType() : string;

    public function getPath() : string;

    public function getUrl() : string;
}