# flux-eco/source-downloader

This component supports the downloading of software sources. e.g. for building docker containers

## Usage
### sourceList.yaml
```
- sourceType: tar-gz
  directoryPath: /var/www
  directoryName: ilias
  url: https://github.com/ILIAS-eLearning/ILIAS/releases/download/v7.7/ILIAS-7.7.tar.gz
- sourceType: git
  url: https://github.com/fluxapps/SrContainerObjectMenu.git
  directoryPath: /var/www/ilias/Customizing/global/plugins/Services/UIComponent/UserInterfaceHook
  directoryName: SrContainerObjectMenu
  tag: v2.5.7
```
### .env 
```
SOURCE_DOWNLOADER_SOURCE_LIST_FILE_PATH=sourceList.yaml
SOURCE_DOWNLOADER_VOLUME_PATH=/tmp
SOURCE_DOWNLOADER_GIT_FULL_CLONE=0
```
### Object-Oriented Usage
```
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
```

### Functional Usage
```
<?php

require_once __DIR__ . '/../vendor/autoload.php';

fluxy\loadDotEnv(__DIR__);

fluxy\downloadSources(
    fluxy\getEnvSourceDownloaderSourceListFilePath(),
    fluxy\getEnvSourceDownloaderVolumePath(),
    fluxy\getEnvSourceDownloaderGitFullClone()
);
```

## Contributing :purple_heart:

Please ...

1. ... register an account at https://git.fluxlabs.ch
2. ... create pull requests :fire:

## Adjustment suggestions / bug reporting :feet:

Please ...

1. ... register an account at https://git.fluxlabs.ch
2. ... ask us for a Service Level Agreement: support@fluxlabs.ch :kissing_heart:
3. ... read and create issues
