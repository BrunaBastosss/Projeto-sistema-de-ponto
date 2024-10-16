<?php
session_start();
if (!isset($_SESSION['id']) || $_SESSION['nivel_id'] != 2) {
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto Coude</title>
    <link rel="stylesheet" href="./style/index.css">
    
</head>
<body>
    <a href="adm2.php" class="botao">Voltar</a>
    
     <div class="container">
        
   <div class="img">
     <img src="./imagens/variedade-de-pessoas-multitasking-em-uma-cena-de-desenho-animado-3d22.png" alt="">
   </div>

 <div class="formulario">
     <h2>Cadastrar <br> funcionários</h2>
     <form id="dadosform">
        <input type="text" placeholder="Nome" id="nome" name="nome">
        <input type="email" placeholder="Email" id="email" name="email"><br><br>
        <input type="text" placeholder="CPF" id="cpf" name="cpf" oninput='maskCPF(this)'>
        <input type="password" placeholder="Senha" id="senha" name="senha"><br><br>
        <input type="text" placeholder="CEP" id="cep" name="cep" oninput='maskcep(this)' onblur="CCEP(this.value);">
      <input type="text" placeholder="Logradouro" id="logradouro" name="logradouro"><br><br>
      <input type="text" placeholder="Bairro" id="bairro" name="bairro">
      <input type="text" placeholder="Cidade" id="cidade" name="cidade"><br><br>
      <input type="text" placeholder="Estado" id="estado" name="estado">
      <input type="text" placeholder="ID" id="nivel_id" name="nivel_id">
      <input type="submit" value="Cadastrar">
    </form>
 </div>
    </div>

    <script src="ler.js"></script>
    <script src="mask.js"></script>
    <script src="APIcep.js"></script>
</body>
</html>