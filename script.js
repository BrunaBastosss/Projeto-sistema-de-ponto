document.addEventListener('DOMContentLoaded', function() {
    const tabela = document.getElementById('tabelas').getElementsByTagName('tbody')[0];
    const botaoRegistrar = document.querySelector('input[type="submit"]');
    
    function atualizarTabela() {
        fetch('select.php')
        .then(response => response.json())
        .then(tasks => {
        tabela.innerHTML = '';
        tasks.forEach(task => {
        const row = tabela.insertRow();
         row.insertCell(0).textContent = task.id;
         row.insertCell(1).textContent = task.data_e_hora;
         row.insertCell(2).textContent = task.tipo;
            });
        })
        .catch(error => console.error('Erro ao atualizar tabela:', error));
    }
    
    function registrarPonto() {
        const dataHora = document.getElementById('horario').textContent;
        const tipo = prompt("Digite o tipo de ponto (entrada/saída):");

        if (tipo) {
            fetch('receber.php', {
            method: 'POST',
            headers: {
       'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: new URLSearchParams({
                    'data_e_hora': dataHora,
                    'tipo': tipo
            })
            })
            .then(response => response.json())
            .then(data => {
            if (data.error) {
         throw new Error(data.error);
         }
        alert('Ponto registrado com sucesso!');
                atualizarTabela();
            })
            .catch(error => {
                console.error('Erro ao registrar ponto:', error);
                alert('Erro ao registrar ponto.');
            });
    }
    }

    botaoRegistrar.addEventListener('click', registrarPonto);

    atualizarTabela();
});
