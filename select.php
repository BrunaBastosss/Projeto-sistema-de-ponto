<?php

// require ('receber.php'); 
$conex = new PDO ('mysql:host=localhost;dbname=sistema_ponto', 'root', '');

$sql = "SELECT * FROM ponto";
$stmt = $conex->query($sql);
$consulta = $stmt-> fetchAll(PDO::FETCH_ASSOC);

echo json_encode($consulta); 


?>
