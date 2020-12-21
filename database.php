<?php
$server = 'localhost';
$username = 'Not';
$password = 'Real';
$database = 'Information';

try{
	$conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch(PDOException $e){
	die( "Connection failed: " . $e->getMessage());
}
