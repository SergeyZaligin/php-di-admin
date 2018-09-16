<?php declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use Engine\Cms;
use Engine\DI\DI;

try {
    // DI container
    $di = new DI();
    $services = require __DIR__ . '/Config/Service.php';
    // Init services
    foreach ($services as $service) 
    {
        $provider = new $service($di);
        $provider->init();
    }
    $cms = new Cms($di);
    // Run Cms
    $cms->run();
} catch (ErrorException $exc) {
    echo $exc->getMessage();
}
