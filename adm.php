<?php
header('Content-Type: application/json');

$conex = new PDO('mysql:host=localhost;dbname=sistema_ponto', 'root', '');

$sql = "SELECT pessoas.nome, ponto.data_e_hora, ponto.tipo
        FROM pessoas 
        INNER JOIN ponto ON pessoas.id = ponto.id_funcionario";

$stmt = $conex->query($sql);


if ($stmt) {
    $consulta = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($consulta);
} else {
    echo json_encode(['erro' => 'Falha na consulta']);
}

?>
