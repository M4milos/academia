function ValidarEmail () {
    let email = document.getElementById('email').value;
    var patern =  /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/;
    if(patern.test(email)){
        let alerta = alert('Email verificado e aprovado');
        return alerta;
    }else{
        let alerta = alert('Verifique seu email');
        return alerta;
    }
    
}

function ValidarSenha(){
    let senha = document.getElementById('senha').value;
    if (senha.length >= 3) {
        let alerta = alert('Senha aprovada');
        return alerta;
    }else{
        let alerta = alert('A senha precisa ter mais de 3 caracteres');
        return alerta;
    }
}

// function atualizou() {
    
//     var selecionar = document.getElementById("Selecionar");
//     if (selecionar != "Selecione") {
//         let select = document.querySelector('#tipo');
//         let optionvalue = select.options[select.selectedIndex];

//         let value = optionvalue.value;
//         let text = optionvalue.text;

//         selecionar.innerHTML = (text);

//         switch (selecionar) {
//             case selecionar.value = "Selecione":
//                 selecionar.innerHTML = "";
//                 break;
//         }
            
//         console.log(value, text);
//     }    
// }

function Mascara(){
    var elemento = document.getElementById('cpf');
    var cpf = elemento.value;
    if (cpf.length == 3 || cpf.length == 7) {
        elemento.value += ".";
    }else if (cpf.length == 11) {
        elemento.value += "-";
    }
}

function IniciarGrafico() {
    if (typeof(Worker) !== "undefined") {
        if(typeof(w) == "undefined"){
            w = new Worker("web_worker.js");
        }
        w.onmessage = function(event) {
            document.getElementById("grafico").innerHTML = event.data;
        }
    } else {
        document.getElementById("grafico").innerHTML = "Sorry! No Web Worker support.";
    }
    
}