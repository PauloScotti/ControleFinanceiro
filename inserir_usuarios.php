<?php

include 'conecta.php';
include 'testelogado.php';

$nome_usuario = $_POST['nome'];
$email_usuario = $_POST['email'];
$senha_usuario = $_POST['senha'];
$niveis_acesso_id = $_POST['niveis_acesso_id'];

$sql = "insert into usuarios (nome, email, senha, niveis_acesso_id)
VALUES ('".$nome_usuario."', '".$email_usuario."', md5('".$senha_usuario."'), '".$niveis_acesso_id."')";

if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully";
	header('Location: listar_usuarios.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>