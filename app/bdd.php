<?php
// ouverture de la connexion
$host = "localhost";
$dbname = "bdd";
$port = "3306";
$username = 'root';
$password = 'root';

$dsn = "mysql:host=$host;port=$port;dbname=$dbname";
$options = [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'];

$db = new PDO($dsn, $username, $password, $options);