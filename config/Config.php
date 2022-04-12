<?php
$DB_HOST = 'localhost';
$DB_NAME = 'cadastro';
$DB_USER = 'root';
$DB_PASS = '';


$pdo = new PDO("mysql:dbname=$DB_NAME;host=$DB_HOST", $DB_USER, $DB_PASS);