<?php

$loader = require __DIR__ . '/../vendor/autoload.php';
/* @var $loader \Composer\Autoload\ClassLoader */
$loader->setUseIncludePath(true);

$base = getenv('TEST_MAGENTO_ROOT');
$paths = array(
    $base . '/app/code/local',
    $base . '/app/code/community',
    $base . '/app/code/core',
    $base . '/lib',
);
set_include_path(implode(PATH_SEPARATOR, $paths) . PATH_SEPARATOR . get_include_path());
unset($paths, $base);