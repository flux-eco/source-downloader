<?php

namespace fluxy;

use FluxEco\SourceDownloader;

function getEnvSourceDownloaderGitFullClone() : bool
{
    return (bool) getenv(SourceDownloader\Env::GIT_FULL_CLONE);
}