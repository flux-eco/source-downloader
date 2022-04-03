<?php

require_once __DIR__ . '/../vendor/autoload.php';

use FluxEco\SourceDownloader;
use FluxEco\DotEnv;

DotEnv\Api::new()->load(__DIR__);

$sourceListFile = getenv(SourceDownloader\Env::SOURCE_LIST_FILE_PATH);
$volumePath = getenv(SourceDownloader\Env::VOLUME_PATH);
$gitGetFullClone = getenv(SourceDownloader\Env::GIT_FULL_CLONE);

$api = SourceDownloader\Api::new($gitGetFullClone);
$api->downloadSources($sourceListFile, $volumePath);