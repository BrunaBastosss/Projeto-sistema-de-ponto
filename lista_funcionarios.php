<?php
session_start();
if(!isset($_SESSION['id']) || $_SESSION['nivel_id'] !=1){
    header('index.php');
    exit;
}
include "conex.php";

$sql = "SELECT id, nome, email, cpf FROM pessoas";
$stmt = $conex->query($sql);
$funcionarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de funcionários</title>
    <link rel="stylesheet" href="./style/listar_funcionario.css">
</head>
<body>
    <h1>Lista de funcionários</h1>
    <table border="1">
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>CPF</th>
            <th>Ação</th>
        </tr>
        <?php foreach ($funcionarios as $funcionario):  ?>

            <tr>
             <td><?php echo $funcionario['nome'];  ?></td>
             <td><?php echo $funcionario['email']; ?></td>
             <td><?php echo $funcionario['cpf'];   ?></td>

             <td>
                <a href="editar_funcionario.php?id=<?php echo $funcionario['id']; ?>"> Editar </a>
            </td>



            </tr>
            <?php endforeach; ?>
    </table>
</body>
</html>