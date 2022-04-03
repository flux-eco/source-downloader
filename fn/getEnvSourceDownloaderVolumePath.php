<?php

namespace fluxy;

use FluxEco\SourceDownloader;

function getEnvSourceDownloaderVolumePath(): string
{
    return getenv(SourceDownloader\Env::VOLUME_PATH);
}