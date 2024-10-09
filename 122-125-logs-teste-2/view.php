<?php include 'db.php'; ?>

<?php
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$sql = "SELECT * FROM sis_logs WHERE id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Visualizar Login</h1>

    <?php if ($row): ?>
        <p><strong>ID:</strong> <?php echo $row['id']; ?></p>
        <p><strong>Registro:</strong> <?php echo $row['registro']; ?></p>
        <p><strong>Data:</strong> <?php echo $row['data']; ?></p>
        <p><strong>Login:</strong> <?php echo $row['login']; ?></p>
    <?php else: ?>
        <p>Login não encontrado</p>
    <?php endif; ?>

    <a href="index.php">Voltar à lista de logins</a>
</body>
</html>
