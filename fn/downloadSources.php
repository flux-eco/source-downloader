<?php

namespace fluxy;

use FluxEco\SourceDownloader\Api;

function downloadSources(string $sourceListFile = null, ?string $volumePath = null, bool $gitGetFullClone = true)
{
    $api = Api::new($gitGetFullClone);
    $api->downloadSources($sourceListFile, $volumePath);
}