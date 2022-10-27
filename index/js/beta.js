


this.onmessage = function(message) {
    if(message.data === 'Iniciar') {
        setInterval(function () {
            getArd();
            // console.log(datajson);
          
        }, 5000);
    }
}
function getArd() {
        xhr = new XMLHttpRequest();
        xhr.open('GET', '../processa/select_web_worker.php');
        xhr.addEventListener('load', (data) => {
            datajson = JSON.parse(data.target.responseText);
            //return datajson;
            postMessage(datajson);

        });
        xhr.send();
}