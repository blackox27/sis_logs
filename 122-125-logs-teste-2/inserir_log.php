<?php
// Inclui a conexão ao banco de dados
include 'db.php';

function inserir_log($conn, $registro, $login) {
    // Prepara a consulta para evitar SQL Injection
    $sql = "INSERT INTO sis_logs (registro, data, login) VALUES (?, ?, ?)";
    
    // Obtem a data e hora atual para o campo 'data'
    $data_atual = date('Y-m-d H:i:s');
    
    // Prepara a declaração
    if ($stmt = $conn->prepare($sql)) {
        // Vincula os parâmetros: 's' = string, 's' = string, 's' = string (para registro, data e login)
        $stmt->bind_param('sss', $registro, $data_atual, $login);
        
        // Executa a consulta
        if ($stmt->execute()) {
            echo "Log inserido com sucesso!";
        } else {
            echo "Erro ao inserir log: " . $stmt->error;
        }
        
        // Fecha a declaração
        $stmt->close();
    } else {
        echo "Erro ao preparar a consulta: " . $conn->error;
    }
}

// Exemplo de uso
// inserir_log($conn, 'Mensagem de teste', 'usuario_teste');

?>
