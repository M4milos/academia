    const botao = document.querySelector('#botao');

    botao.addEventListener('click', (event) => {
        event.preventDefault();

    if (window.Worker) {
        getArd();
        function getArd() {
            $.ajax({
                url : '../processa/select_web_worker.php',
                method : 'POST',
                dataType : 'JSON'
            }).done(function(result){
            if(event.srcElement.id == "iniciar"){
                inicia(result);
            }else if(event.srcElement.id == "finalizar"){
                para();
            }
            });
        }
    }else{
        alert('Seu navegador não suporta Web Workers');
    } 
});

var w;

function inicia(result) {
  if(typeof(Worker) !== "undefined") {
    if(typeof(w) == "undefined") {
      w = new Worker("../js/beta.js");
    //   console.log(result);
      w.postMessage(result);
    }
    w.onmessage = function(event) {
      console.log(event);
    };
  } else {
    console.log("Erro");
  }
}

function para() { 
  w.terminate();
  w = undefined;
}