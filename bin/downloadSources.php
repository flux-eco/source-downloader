<?php

require_once __DIR__ . '/../vendor/autoload.php';

use FluxEco\SourceDownloader\Adapters\Api\SourceDownloaderApi;

$sourceListFile = null;
$volumePath = null;
$gitGetFullClone = null;

if (count($argv) === 4) {
    $sourceListFile = __DIR__ . '/' . $argv[1];
    $volumePath = $argv[2];
    $gitGetFullClone = (bool)$argv[3];
}

$api = SourceDownloaderApi::new($sourceListFile, $volumePath, $gitGetFullClone);
$api->downloadSources();