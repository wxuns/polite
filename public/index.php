<?php

define('APPLICATION_PATH', realpath(dirname(__FILE__ ) . '/../'));

$application = new Yaf\Application( APPLICATION_PATH . "/conf/application.ini");

$application->bootstrap()->run();
?>
