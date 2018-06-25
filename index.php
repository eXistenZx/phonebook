<?php
session_start();

require(__DIR__ . '/vendor/autoload.php');
include 'src/Application.php';
// use Phonebook\Controllers;
// use Phonebook\Controllers\ContactsController;
// use Phonebook\Controllers\CoreController;
// use Phonebook\Controllers\MainController;
// use Phonebook\Models;
// use Phonebook\Models\CoreModel;
// use Phonebook\Models\ContactsModel;
// use Phonebook\Utils\Database;
// print_r(get_declared_classes());

$application = new PhoneBook\Application();
$application->run();
