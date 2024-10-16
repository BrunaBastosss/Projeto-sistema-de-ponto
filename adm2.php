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
    <title>Admin</title>
    <link rel="stylesheet" href="./style/adm.css">
</head>
<body>
<a href="cadastro.php" class="botao">Cadastro</a>
    <h1>Ponto dos funcionários</h1>
    <table>
        <thead>
            <tr>
                <td>Funcionario(a)</td>
                <td>Tipo</td>
                <td>Data/Horário</td>
            </tr>
        </thead>
        <tbody id="funcionarios">
            
        </tbody>
    </table>

    <script>
        
        function Tabelas() {
            const tabela = document.getElementById('funcionarios');
            fetch('adm.php') 
                .then((response) => response.json()) 
                .then((funcionarios) => { 
                    tabela.innerHTML = ''; 
                    funcionarios.forEach((funcionario) => { 
                        const row = tabela.insertRow(); 
                        row.insertCell(0).textContent = funcionario.nome; 
                        row.insertCell(1).textContent = funcionario.tipo
                        row.insertCell(2).textContent = funcionario.data_e_hora; 
                    });
                })
                .catch((error) => console.error('Erro ao atualizar tabela:', error));
        }

        
        document.addEventListener('DOMContentLoaded', Tabelas);
    </script>
</body>
</html>
