<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ponto</title>
    <link rel="stylesheet" href="./style/ponto.css">
</head>
<body>
<div class="container">
    <h1>Registrar ponto</h1>
     <div class="botao">
    <input type="submit" value="Registrar">
    </div>
    <div class="divdatetime">
<p id="horario"> <?php echo date("d/m/Y H:i:s");  ?> </p>
   </div>

    </div>
    <table id="tabelas">
        <thead>
            <tr>
                <td>ID</td>
                <td>Horário</td>
                <td>Tipo</td>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
    

<script>
 function atualizarHR(){
 var data = new Date().toLocaleString("pt-br", {
  timeZone: "America/Bahia"
 });
 document.getElementById("horario").innerHTML = data.replace(",", "  -  ");
 }
 setInterval(atualizarHR, 1000); 
</script> 

<script src="script.js"></script>
</body>
</html>

<?php
// require_once('receber.php');
// try {
//     $conex = new PDO('mysql:host=localhost;dbname=sistema_ponto', 'root', '');
//     $conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
// } catch (PDOException $e) {
//     echo json_encode(['error' => 'conexão falhou ' . $e->getMessage()]);
//     exit;
// }

// $sql = "SELECT * FROM ponto"; 
// $result = $conex->prepare($sql);
// $result->execute();

// $data = $result->fetchAll(PDO::FETCH_ASSOC);
// $response = ['data' => $data];

// echo json_encode($response, JSON_PRETTY_PRINT);

?>



