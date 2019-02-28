<?php

define('APPLICATION_PATH', realpath(dirname(__FILE__).'/../'));

session_save_path(APPLICATION_PATH.'/storage/framework/session');
session_start();
$application = new Yaf\Application(APPLICATION_PATH.'/conf/application.ini');

$application->bootstrap()->run();
