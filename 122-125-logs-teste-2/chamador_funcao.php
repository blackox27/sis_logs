<?php
// Inclui o arquivo da função e conexão com banco de dados
include 'inserir_log.php';

// Exemplo de inserção de log
$registro = "Usuário realizou login no sistema.";
$login = "usuario_exemplo";

inserir_log($conn, $registro, $login); // Chamada da função
?>
