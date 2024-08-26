document.getElementById('dadosform').addEventListener('submit', function(event){
    event.preventDefault()  
   
    const formData = new FormData(this) 
    const cep = formData.get('cep').replace(/\D/g,'')
    formData.set('cep', cep)
   
    fetch('receber.php',{
   
       method: 'POST',
       body: formData
    })
    .then((response) => {
    response.json()
    })
   .then((data) => {
       console.log(data)
       alert('Enviado com sucesso')
   })
   .catch((error) =>{
       console.log(error)
       alert('Ocorreu um erro')
   })
   })