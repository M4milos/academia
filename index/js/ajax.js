$('#form-cidade').submit(function(e){
    e.preventDefault();
    var nome = $('#nome').val();
function getCidade(){
    $.ajax({
        url: '../acao/select.php',
        method: 'GET',
        dataType: `JSON`
    }).done(function(result){
        var resultado = document.querySelector('#resultado');
                while(resultado.firstChild){
                    resultado.firstChild.remove();
                }
        for (var i = 0; i < result.length; i++) {
            $('#resultado').prepend('<tr><td>'+result[i].idcidade+'</td><td>'+result[i].nome_cidade+'</td><td>'+result[i].estado+'</td><td><a href="index.php?acao=Editar&id='+result[i].idcidade+'"><img src="../img/pencil-square.svg"></a></td><td><a href="../acao/acao.php?acao=Excluir&id='+result[i].idcidade+'"><img src="../img/trash-fill.svg"></a></td></tr>');
        }
    });
}
preventDefault();
getCidade();