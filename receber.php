<?php 
header('Content-Type: application/json');
$conex = new PDO('mysql:host=localhost;dbname=sistema_ponto', 'root', '');

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
$result -> bindParam(':data_hora', $data_hora);
$result -> bindParam(':cpf', $cpf);
$result -> bindParam(':cep', $cep);
$result -> bindParam(':logradouro', $logradouro);
$result -> bindParam(':bairro', $bairro);
$result -> bindParam(':cidade', $cidade);
$result -> bindParam(':estado', $estado);

$result-> execute();

$response ['pessoa'] = [
 'nome' => $nome,
 'email' => $email,
 'senha' => $senha,
 'cpf' => $cpf,
 'data_hora' => $data_hora,
 'cep' => $cep,
 'logradouro' => $logradouro,
 'bairro' => $bairro,
 'cidade' => $cidade,
 'estado' => $estado
];

$response = [];

$data_e_hora = $_POST['data_e_hora'];
$tipo = $_POST['tipo'];

$sql = "INSERT INTO ponto (id, data_e_hora, tipo) VALUES (:id, :data_e_hora, :tipo)";
$result = $conex ->prepare($sql);
$result-> bindParam('id', $id);
$result-> bindParam(':data_e_hora', $data_e_hora);
$result-> bindParam(':tipo', $tipo);

$response['ponto'] = [
 'id' => $id,
 'data_e_hora' => $data_e_hora,
 'tipo' => $tipo
];

echo json_encode($response, JSON_PRETTY_PRINT)

 ?>
