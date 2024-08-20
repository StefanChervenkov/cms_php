<?php

// Include Composer's autoload file
require 'vendor/autoload.php';

// Load environment variables from the .env file
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);

$dotenv->load();


// Access the environment variables and use them to connect to the database
$db_host = $_ENV['DB_HOST'];
$db_name = $_ENV['DB_NAME'];
$db_user = $_ENV['DB_USER'];
$db_password = $_ENV['DB_PASSWORD'];

$con = mysqli_connect($db_host, $db_user, $db_password, $db_name);
