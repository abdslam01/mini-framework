#!/usr/bin/env php
<?php

require './vendor/autoload.php';

use Symfony\Component\Console\Application;
use Console\ModelMakeCommand;
use Console\ControllerMakeCommand;


$application = new Application();

# add commands in here
$application->add(new ControllerMakeCommand());
$application->add(new ModelMakeCommand());

$application->run();