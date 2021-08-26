#!/usr/bin/env php
<?php

require './vendor/autoload.php';

use Abdslam01\MiniFrameworkCore\Env;
use Symfony\Component\Console\Application;
use Abdslam01\MiniFrameworkCore\Helpers\Helpers;
use Abdslam01\MiniFrameworkCore\Database\Database;
use Abdslam01\MiniFrameworkCore\Console\ModelMakeCommand;
use Abdslam01\MiniFrameworkCore\Console\MigrationMakeCommand;
use Abdslam01\MiniFrameworkCore\Console\ControllerMakeCommand;
use Abdslam01\MiniFrameworkCore\Console\MigrationExecuteCommand;

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