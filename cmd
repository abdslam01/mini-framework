#!/usr/bin/env php
<?php

require './vendor/autoload.php';

use Symfony\Component\Console\Application;
use Console\ModelMakeCommand;
use Console\ControllerMakeCommand;
use Console\MigrationExecuteCommand;
use Console\MigrationMakeCommand;
use Database\Database;

define("BASE_DIR", dirname(__FILE__));

require_once "./vendor/autoload.php";

Env::load();
Helpers::load();
Database::init();

$application = new Application();

# add commands in here
$application->add(new ControllerMakeCommand());
$application->add(new ModelMakeCommand());
$application->add(new MigrationExecuteCommand());
$application->add(new MigrationMakeCommand());

$application->run();