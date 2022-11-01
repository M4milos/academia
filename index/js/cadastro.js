const botao = document.querySelector('#Entrar'); 

botao.addEventListener('click', (event) => {
    
    if(event.srcElement.id == "Entrar"){
        console.log("Entrar");
        MudarCampo(); 
    }
});

function MudarCampo(){

}