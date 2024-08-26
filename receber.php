<?php 
header('Content-Type application/json');
$conex = new pdo('mysql:host=localhost;dbname=sistema_ponto', 'root', '');

$response = [];

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$data_hora = $_POST['data_hora'];
$cpf = $_POST['cpf'];
$cep = $_POST['cep'];
$logradouro = $_POST['logradouro'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$estado = $_POST ['estado'];



$sql = "INSERT INTO pessoas (nome, email, senha, data_hora, cpf, cep, logradouro, bairro, cidade, estado) VALUES (:nome, :email, :senha, :data_hora, :cpf, :cep, :logradouro, :bairro, :cidade, :estado)";

$result = $conex ->prepare($sql);
$result -> bindParam(':nome', $nome);
$result -> bindParam(':email', $email);
$result -> bindParam(':senha', $senha);
$result -> bindParam('data_hora', $data_hora);
$result -> bindParam(':cpf', $cpf);
$result -> bindParam(':cep', $cep);
$result -> bindParam(':logradouro', $logradouro);
$result -> bindParam(':bairro', $bairro);
$result -> bindParam(':cidade', $cidade);
$result -> bindParam(':estado', $estado);

$result-> execute();

$response ['data'] = [
 'nome' => $nome,
 'email' => $email,
 'senha' => $senha,
 'nome' => $nome,
 'cpf' => $cpf,
 'data_hora' => $data_hora,
 'cep' => $cep,
 'logradouro' => $logradouro,
 'bairro' => $bairro,
 'cidade' => $cidade,
 'estado' => $estado
];

echo json_encode($response, JSON_PRETTY_PRINT)
 ?>
 
 <?php 