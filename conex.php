<?php
try {
    $conex = new PDO('mysql:host=localhost;dbname=sistema_ponto', 'root', '');
    $conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Erro de conexão: ' . $e->getMessage());
}

?>