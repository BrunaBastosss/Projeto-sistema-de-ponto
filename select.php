<?php
require ('conex.php'); 
session_start();

$id_usuario = $_SESSION['id'];
$sql = "SELECT * FROM ponto WHERE id_funcionario = $id_usuario";
$stmt = $conex->query($sql);
$consulta = $stmt-> fetchAll(PDO::FETCH_ASSOC);

echo json_encode($consulta); 


?>
