<?php

$server = 'localhost';
$nombre_usuario = 'root';
$password = '';
$nombre_db = 'login_db';

try {
    $conn = new PDO("mysql:host=$server;dbname=$nombre_db;",$nombre_usuario, $password);
} catch (PDOException $e) {
die('conexion fallida:' .$e->getMessage());

}

?>