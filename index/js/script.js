if (window.Worker) {
  const botao = document.querySelector('#botao');

  botao.addEventListener('click', (event) => {

      if(event.srcElement.id == "iniciar"){
        console.log("Iniciando");
        inicia();
      }else if(event.srcElement.id == "finalizar"){
        console.log("Finalizar");
        para();
      }
      
    
  });

}else{
  alert('Seu navegador não suporta Web Workers');
}

var w;

function inicia(){
  if(typeof(Worker) !== "undefined") {
    if(typeof(w) == "undefined") {
      w = new Worker("../js/beta.js");
      w.postMessage('Iniciar');
    }
      w.addEventListener('message', (event) => {
          console.log(event.data);
      });
    }else{
      console.log("Erro");
    }
  }


function para() { 
  if (typeof(w) !== "undefined") {
    w.terminate();
    w = undefined;
  }
}