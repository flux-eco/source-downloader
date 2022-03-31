<?php

require_once __DIR__ . '/../vendor/autoload.php';

use FluxEco\SourceDownloader\Adapters\Api\SourceDownloaderApi;

$api = SourceDownloaderApi::new();
$api->downloadSources();