<?php
$host = 'localhost';
$db = 'yrpreytasks';
$user = 'root';
$pass = '';

// Conexão com o banco de dados usando mysqli
$mysqli = new mysqli($host, $user, $pass, $db);

if ($mysqli->connect_error) {
    die('Erro de conexão: ' . $mysqli->connect_error);
}
?>
