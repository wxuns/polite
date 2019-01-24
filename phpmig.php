<?php

use \Phpmig\Adapter;
use Pimple\Container;
use Illuminate\Database\Capsule\Manager as Capsule;
$container = new Container();

$container['config'] = [
    'driver'    => 'xxx',
    'host'      => 'xxx',
    'database'  => 'xxx',
    'username'  => 'xxx',
    'password'  => 'x',
    'charset'   => 'xxx',
    'collation' => 'xxx',
    'prefix'    => '',
];

$container['db'] = function ($c) {
    $capsule = new Capsule();
    $capsule->addConnection($c['config']);
    $capsule->setAsGlobal();
    $capsule->bootEloquent();

    return $capsule;
};

$container['phpmig.adapter'] = function($c) {
    return new Adapter\Illuminate\Database($c['db'], 'migrations');
};
$container['phpmig.migrations_path'] = __DIR__ . DIRECTORY_SEPARATOR . 'migrations';

return $container;

return $container;