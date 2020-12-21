<?php
$server = 'localhost';
$username = 'test';
$password = 'test';
$database = 'BEVFR';

try{
	$conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch(PDOException $e){
	die( "Connection failed: " . $e->getMessage());
}
