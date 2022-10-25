if (window.Worker) {
    
    const worker = new Worker('beta.js');

    const botao = document.querySelector('#iniciar');

    botao.addEventListener('click', (event) => {
        console.log('Iniciando...');
        worker.postMessage('Iniciar');
    });

}else{
    alert('Seu navegador não suporta Web Workers');
}
