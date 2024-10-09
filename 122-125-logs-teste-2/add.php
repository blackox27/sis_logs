<?php include 'db.php'; ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $registro = $_POST['registro'];
    $login = $_POST['login'];
    $data = date('Y-m-d H:i:s');

    $sql = "INSERT INTO sis_logs (registro, data, login) VALUES ('$registro', '$data', '$login')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Erro ao adicionar login: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Adicionar Novo Login</h1>

    <form method="POST" action="add.php">
        <label for="registro">Registro:</label>
        <textarea name="registro" required></textarea>

        <label for="login">Login:</label>
        <input type="text" name="login" required />

        <button type="submit">Adicionar</button>
    </form>

    <a href="index.php">Voltar à lista de logins</a>
</body>
</html>
