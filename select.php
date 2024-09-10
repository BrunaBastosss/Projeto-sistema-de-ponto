<?php

require ('receber.php'); 

$sql = "SELECT * FROM ponto";
$stmt = $conex->query($sql);
$consulta = $stmt-> fetchAll(PDO::FETCH_ASSOC);

echo json_encode($consulta); 
?>

