<?php

include 'conecta.php';
include 'testelogado.php';

$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha_usuario = $_POST['senha'];
$niveis_acesso_id = $_POST['niveis_acesso_id'];


$sql = "update usuarios set nome = '".$nome."', email = '".$email."', 
   senha = md5('".$senha_usuario."'), niveis_acesso_id = ".$niveis_acesso_id."
    where id = '".$id."'";

if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully";
	header('Location: listar_usuarios.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>

<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" >

<div class="container" style="widht: 500px; margin-top: 20px">
<center>
	<h4>Produto adicionado com sucesso!</h4>
</center>
</div>

<center>
<div style="padding-top: 20px">
	<a href="index.php" role="button" class="btn btn-sm btn-primary">Cadastrar novo produto</a>
	<a href="listar_produtos.php" role="button" class="btn btn-sm btn-primary">Lista de produtos</a>
</div>
</center>-->