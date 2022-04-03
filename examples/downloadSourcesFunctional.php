<?php

require_once __DIR__ . '/../vendor/autoload.php';

fluxy\loadDotEnv(__DIR__);

fluxy\downloadSources(
    fluxy\getEnvSourceDownloaderSourceListFilePath(),
    fluxy\getEnvSourceDownloaderVolumePath(),
    fluxy\getEnvSourceDownloaderGitFullClone()
);