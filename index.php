<?php
session_start();

require(__DIR__ . '/vendor/autoload.php');
include 'src/Application.php';

$application = new PhoneBook\Application();
$application->run();
