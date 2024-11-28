<?php
include 'conex.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = "SELECT * FROM pessoas WHERE id = :id";
    $stmt = $conex->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $funcionario = $stmt->fetch(PDO::FETCH_ASSOC);


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $cpf = $_POST['cpf'];
        $cep = $_POST['cep'];
        $logradouro = $_POST['logradouro'];
        $bairro = $_POST['bairro'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
      

        
        $sql = "UPDATE pessoas SET nome = :nome, email = :email, cpf = :cpf, cep = :cep, logradouro = :logradouro, bairro = :bairro, cidade = :cidade, estado = :estado WHERE id = :id";        $stmt = $conex->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':cep', $cep);
        $stmt->bindParam(':logradouro', $logradouro);
        $stmt->bindParam(':bairro', $bairro);
        $stmt->bindParam(':cidade', $cidade);
        $stmt->bindParam(':estado', $estado);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        echo "Funcionário atualizado com sucesso!";
        header("Location: lista_funcionarios.php"); 
        exit;
    }
} else {
    
    header("Location: cadastro.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Funcionário</title>
    <link rel="stylesheet" href="./style/editar.css">
</head>
<body>
    
    <form method="POST">
        Nome: <input type="text" name="nome" value="<?php echo htmlspecialchars($funcionario['nome']); ?>" required><br>
        Email: <input type="email" name="email" value="<?php echo htmlspecialchars($funcionario['email']); ?>" required><br>
        CPF: <input type="text" id="cpf" name="cpf" oninput='maskCPF(this)' value="<?php echo htmlspecialchars($funcionario['cpf']); ?>" required><br>
        CEP: <input type="text"  id="cep" name="cep" oninput='maskcep(this)' onblur="CCEP(this.value);"value="<?php echo htmlspecialchars($funcionario['cep']); ?>" ><br>
        Logradouro: <input type="text" id="logradouro" name="logradouro" value="<?php echo htmlspecialchars($funcionario['logradouro']); ?>"><br>
        Bairro: <input type="text" id="bairro" name="bairro" value="<?php echo htmlspecialchars($funcionario['bairro']); ?>"><br>
        Cidade: <input type="text" id="cidade" name="cidade" value="<?php echo htmlspecialchars($funcionario['cidade']); ?>"><br>
        Estado: <input type="text" id="estado" name="estado" value="<?php echo htmlspecialchars($funcionario['estado']); ?>"><br>
       
        <input type="submit" value="Atualizar">
    </form>

    <script src="APIcep.js"></script>
    <script src="mask.js"></script>
</body>
</html>

