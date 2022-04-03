<?php

namespace fluxy;

use FluxEco\SourceDownloader;

function getEnvSourceDownloaderSourceListFilePath()
{
    return getenv(SourceDownloader\Env::SOURCE_LIST_FILE_PATH);
}