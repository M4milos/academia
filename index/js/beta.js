self.onmessage = function Mensagem(message){
    setInterval(function () {
        console.log('.');
        console.log(message);
    }, 500);
    
}