document.addEventListener('DOMContentLoaded', function () {
    atualizarTabela()
})

function atualizarTabela() {
    const tabela = document
        .getElementById('tabelas')
        .getElementsByTagName('tbody')[0]
    fetch('select.php')
        .then((response) => response.json())
        .then((tasks) => {
            tabela.innerHTML = ''
            tasks.forEach((task) => {
                const row = tabela.insertRow()
                row.insertCell(0).textContent = task.id
                row.insertCell(1).textContent = task.data_e_hora
                row.insertCell(2).textContent = task.tipo
            })
        })
        .catch((error) => console.error('Erro ao atualizar tabela:', error))
}

document
    .getElementById('formponto')
    .addEventListener('submit', function (event) {
        event.preventDefault()
        const formData = new FormData(this)

        fetch('insert.php', {
            method: 'POST',
            body: formData,
        })
            .then((response) => response.json())
            .then((data) => {
                console.log(data)
                alert('Ponto registrado com sucesso!')
                atualizarTabela()
            })
            .catch((error) => {
                console.error('Erro ao registrar ponto:', error)
                alert('Erro ao registrar ponto.')
            })
    })