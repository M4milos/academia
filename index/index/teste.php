<?php
    include('../../classes/autoload.class.php');
?>
<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testa</title>
    <script>const input = document.querySelector("input")
const form = document.querySelector("form")

form.onsubmit = (e) => {
  e.preventDefault()
  input.required = false
}</script>
</head>
<body>
<form>
  <input required>
  <button type='submit'>
    Submit
  </button>
</form>
</body>
</html>