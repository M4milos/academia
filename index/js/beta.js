this.onmessage = function(message) {
    if(message.data === 'Iniciar') {
        setInterval(function () {
            getArduino(getArd())
        }, 5000);
    }
}
function getArd() {
        xhr = new XMLHttpRequest();
        xhr.open('GET', '../processa/select_web_worker.php');
        xhr.addEventListener('load', (data) => {
            const datajson = JSON.parse(data.target.responseText);
            return datajson;
        });

        xhr.send();
}