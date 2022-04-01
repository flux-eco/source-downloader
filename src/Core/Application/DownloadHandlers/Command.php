<?php

namespace FluxEco\SourceDownloader\Core\Application\DownloadHandlers;

interface Command
{
    public function getSourceType() : string;

    public function getUrl() : string;

    public function getDirectoryPath() : string;

    public function getDirectoryName() : string;

    public function getTag() : string;
}