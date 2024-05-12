<?php

$server		= 'localhost';
$username	= 'root';
$pass     = '';
$db_name	= 'pweb';

try
{
  $conn		= new PDO("mysql:host=$server;dbname=$db_name", $username, $pass);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e)
{
  echo $e->getMessage();
}


 ?>
