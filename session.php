<?php
session_start();
require 'conex.php';


if (isset($_POST['email']) && isset($_POST['senha'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

   
    $sql = "SELECT * FROM pessoas WHERE email = :email AND senha = :senha";
    $stmt = $conex->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', $senha);
    $stmt->execute();

    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario) {
     $_SESSION['id'] = $usuario['id'];
     $_SESSION['nome'] = $usuario['nome'];
     $_SESSION['nivel_id'] = $usuario['nivel_id']; 

     
     if ($usuario['nivel_id'] == 1) {
        header('Location: adm2.php');
    } elseif ($usuario['nivel_id'] == 2) {
       header('Location: ponto.php'); 
    }
    exit;
} else {
    echo "E-mail ou senha incorretos!";
}
}

?>