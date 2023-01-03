<?php

require __DIR__ . '/vendor/autoload.php';

use Metakomputer\core\{Controller, Router};

use Metakomputer\Admin\controllers\{Dashboard};

$router = new Router;

// Router halaman admin
$router->add(method: 'get', controller: Dashboard::class, path: '/admin', handler: 'index');
$router->add(method: 'get', controller: Dashboard::class, path: '/admin/dashboard', handler: 'index');
$router->run();