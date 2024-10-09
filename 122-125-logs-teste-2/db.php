<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'erpl'; // Substitua pelo nome do seu banco

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>
