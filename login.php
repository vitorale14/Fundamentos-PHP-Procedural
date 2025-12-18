<?php
//permitir que o sistema lembre do usuário
//verificar se o email e senha foram enviados
//validar o formato do email
//buscar o email no banco de dados
//se o usuário não existir, negar acesso
//verificar se a senha digitada corresponde a senha no banco de dados
//se a senha estiver errada, negar acesso
//se tudo estiver correto, liberar acesso

$email = $_POST['email'] ?? null;
$senha = $_POST['senha'] ?? null;
var_dump($email, $senha);
?>

<form method="post">
    <input type="email" name="email">
     <input type="password" name="senha">
     <button>Enviar</button>
</form>

<?php

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($email) || empty($senha)) {
        echo "<script>alert('Preencha todos os campos');</script>";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Email inválido');</script>";
        }
    } else {
        echo "(Tudo certo até aqui!)";
}
?>







