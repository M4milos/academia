$(window).on('load',function(e){
    e.preventDefault();
    getArd();
});

function getArd() {
    $.ajax({
        url : '../processa/select_web_worker.php',
        method : 'POST',
        data: {acao : 'Selecionar'},
        dataType : 'JSON'
    }).done(function(result){
        console.log(result);
        getArduino(result);
    })
}

function Atrelacao(result){
    // console.log(result);
    // for(var i = 0; i < result.length; i++){
    //     $('#listar').prepend('<tr><th>ID do arduino: </th><th>Temperatura: </th> <th>Aceleração eixo Y: </th> <th>Aceleração eixo X: </th> <th>Giro eixo Y: </th> <th>Giro eixo X: </th></tr> <td>'+ result[i].id_arduino + '</td><td>'+ result[i].temp_value + '</td> <td>' + result[i].AcY +  '</td> <td>' + result[i].AcX + '</td> <td>' + result[i].GyY + '</td> <td>' + result[i].GyX + '</td> <td>')
    // }
}
// preventDefault();
// getArd();