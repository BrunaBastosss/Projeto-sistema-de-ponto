<?php
header('Content-Type: application/json');
session_start(); 
$conex = new PDO('mysql:host=localhost;dbname=sistema_ponto', 'root', '');

$response = [];


if (isset($_SESSION['id'])) {
    $id_funcionario = $_SESSION['id']; 
    $tipo = $_POST['tipo'];

 
    $sql = "INSERT INTO ponto (id_funcionario, tipo) VALUES (:id_funcionario, :tipo)";
    $result = $conex->prepare($sql);
    $result->bindParam(':id_funcionario', $id_funcionario);
    $result->bindParam(':tipo', $tipo);

    if ($result->execute()) {
        $response['ponto'] = [
            'funcionario' => $id_funcionario,
            'tipo' => $tipo,
            'status' => 'Ponto registrado com sucesso.'
        ];
    } else {
        $response['error'] = 'Erro ao registrar ponto.';
    }
} else {
    $response['error'] = 'Usuário não autenticado.';
}


echo json_encode($response, JSON_PRETTY_PRINT);
?>