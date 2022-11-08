$('#editar').submit(function(e){
    e.preventDefault();
    var id = $('#id').val();
    var nome = $('#nome').val();
    var email = $('#email').val();
    var cpf = $('#cpf').val();
    var senha = $('#senha').val();
    var tipo = $('#tipo').val();
    var acao = $('#acao').val();

    $.ajax({
        url: '../processa/processa.php',
        method : 'POST',
        data : {id:id , nome:nome , email:email , cpf:cpf , senha:senha , tipo:tipo , acao:acao},
        dataType: 'JSON'
    }).done(function(r){
        console.log(acao);
        if (acao == 'Editar') {
            location.href='index.php';
        }else{
            location.href='index.php';
        }
    }).fail(function(request){
        console.log(acao);
        console.log(request.responseText);
    });;
});

function Listar(nome){
    // console.log(nome);
    var usuario = document.querySelector('#usuario');
    usuario.innerHTML = nome;
}