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
    }).done(function(result){
        console.log(result);
        if (acao == 'editar') {
            getNome();
        }else{
            location.href='index.php';
        }
    });
});

function getNome() {
    var id = $('#id').val();
    $.ajax({
        url : '../processa/select.php',
        method : 'POST',
        data: {id : id},
        dataType : 'JSON'
    }).done(function(result){
        // console.log(result);
        Prepare(result);
    })
}

function Prepare(result){
    // console.log(result);
    for(var i = 0; i < result.length; i++){
        MudarNome(result[i].nome);
    }
}

function MudarNome(nome){
    var nome = nome;
    $.ajax({
        url : '../processa/processa.php',
        method : 'POST',
        data : {nome : nome, acao : 'mudarNome'},
        dataType : 'JSON'
    }).done(function(result){
        getName();
    })
}

function getName() {
    $.ajax({
        url : '../processa/select.php',
        method : 'POST',
        data: {acao : 'Selecionar'},
        dataType : 'JSON'
    }).done(function(result){
        // console.log(result);
        Atrelacao(result);
    })
}

function Atrelacao(result){
    // console.log(result);
    for(var i = 0; i < result.length; i++){
        Listar(result[i].nome);
    }
}

function Listar(nome){
    // console.log(nome);
    var usuario = document.querySelector('#usuario');
    usuario.innerHTML = nome;
}
getName();