async function CCEP(input){  
    var cep = input.replace(/\D/g,'');
    try{
        if(cep != ''){
            const response = await fetch(`https://viacep.com.br/ws/${cep}/json/`)
            const data = await response.json();

            document.getElementById ('logradouro').value = data.logradouro
            document.getElementById ('bairro').value = data.bairro
            document.getElementById ('cidade').value = data.localidade
            document.getElementById ('estado').value = data.uf

            
        }
    }catch (error){
        console.log(console.error);
    }
}