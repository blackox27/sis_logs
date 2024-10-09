<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Logins</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Gerenciamento de Logins</h1>

    <!-- Pesquisa -->
    <form method="GET" action="index.php">
        <input type="text" name="search" placeholder="Pesquisar login..." />
        <button type="submit">Pesquisar</button>
    </form>

    <!-- Listar logins -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Registro</th>
                <th>Data</th>
                <th>Login</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $search = isset($_GET['search']) ? $_GET['search'] : '';
            $sql = "SELECT * FROM sis_logs WHERE login LIKE '%$search%'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $row['data'] = date('d/m/Y H:i:s', strtotime($row['data']));
		    echo "<tr>";
                    echo "<td>{$row['id']}</td>";
                    echo "<td>{$row['registro']}</td>";
                    echo "<td>{$row['data']}</td>";
                    echo "<td>{$row['login']}</td>";
                    echo "<td><a href='view.php?id={$row['id']}'>Visualizar</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Nenhum login encontrado</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <a href="add.php">Adicionar novo login</a>
</body>
</html>
