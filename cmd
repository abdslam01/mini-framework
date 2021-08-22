#!/usr/bin/env php
<?php

require './vendor/autoload.php';

use Symfony\Component\Console\Application;
use MyConsole\GreetCommand;
use MyConsole\ControllerMakeCommand;

$application = new Application();

# add commands in here
$application->add(new GreetCommand());
$application->add(new ControllerMakeCommand());

$application->run();