<?php return array(
    'root' => array(
        'pretty_version' => '1.0.2',
        'version' => '1.0.2.0',
        'type' => 'flux-eco',
        'install_path' => __DIR__ . '/../../',
        'aliases' => array(),
        'reference' => NULL,
        'name' => 'flux-eco/source-downloader',
        'dev' => true,
    ),
    'versions' => array(
        'flux-eco/shell-executor' => array(
            'pretty_version' => '0.0.1',
            'version' => '0.0.1.0',
            'type' => 'flux-app',
            'install_path' => __DIR__ . '/../flux-eco/shell-executor',
            'aliases' => array(),
            'reference' => 'bf1dd67ecd242864449d42cb92a55a5c20357a98',
            'dev_requirement' => false,
        ),
        'flux-eco/source-downloader' => array(
            'pretty_version' => '1.0.2',
            'version' => '1.0.2.0',
            'type' => 'flux-eco',
            'install_path' => __DIR__ . '/../../',
            'aliases' => array(),
            'reference' => NULL,
            'dev_requirement' => false,
        ),
    ),
);
