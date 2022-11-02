<?php

include 'conecta.php';
include 'testelogado.php';

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$cep = $_POST['cep'];
$logradouro = $_POST['logradouro'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$uf = $_POST['uf'];
$numero = $_POST['numero'];
$complemento = $_POST['complemento'];
$telefone = $_POST['telefone'];
$dataNasc = $_POST['dataNasc'];
$salario = $_POST['salario'];

$sql = "insert into colaboradores (nome, cpf, email, cep, logradouro, bairro, cidade, uf, numero, complemento, telefone, dataNasc, salario)
VALUES ('".$nome."', '".$cpf."', '".$email."', '".$cep."', '".$logradouro."', '".$bairro."', '".$cidade."', '".$uf."', ".$numero.", '".$complemento."', '".$telefone."', '".date('Y-m-d', strtotime($dataNasc))."', ".$salario.")";

if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully";
	header('Location: listar_colaboradores.php');
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