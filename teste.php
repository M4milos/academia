<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title> Validação de E-mail com JavaScript</title>
<script language="Javascript">
function validacaoEmail(field) {
usuario = field.value.substring(0, field.value.indexOf("@"));
dominio = field.value.substring(field.value.indexOf("@")+ 1, field.value.length);
if ((usuario.length >=1) &&
    (dominio.length >=3) &&
    (usuario.search("@")==-1) &&
    (dominio.search("@")==-1) &&
    (usuario.search(" ")==-1) &&
    (dominio.search(" ")==-1) &&
    (dominio.search(".")!=-1) &&
    (dominio.indexOf(".") >=1)&&
    (dominio.lastIndexOf(".") < dominio.length - 1)) {
document.getElementById("msgemail").innerHTML="E-mail válido";
alert("email valido");
}
else{
document.getElementById("msgemail").innerHTML="<font color='red'>Email inválido </font>";
alert("E-mail invalido");
}
}


    
console.log(validateEmail('texto@texto.com')); // true
console.log(validateEmail('texto@texto')); // false
console.log(validateEmail('texto.com')); // false
console.log(validateEmail('texto')); // false
</script>
</head>
<body>
<form name="f1">
<h3> Validação de E-mail com JavaScript</h3>
<hr color='gray'>
<table>
<tr>
<td>
E-mail:
<input type="text" name="email" onblur="validacaoEmail(f1.email)"  maxlength="60" size='65'>
</td>
<td>
<div id="msgemail"></div>
</td>
</tr>
</table>
<hr color='gray'>
</form>
</body>
</html>