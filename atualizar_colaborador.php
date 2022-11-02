<?php

include 'conecta.php';
include 'testelogado.php';

$id_colaborador = $_POST['id_colaborador'];
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
$dataNasc = strtr($_REQUEST['dataNasc'], '/', '-');
$salario = $_POST['salario'];
$tipoContrato = $_POST['tipoContrato'];

$sql = "update colaboradores set nome = '".$nome."', cpf = '".$cpf."', email = '".$email."', cep = '".$cep."',
 logradouro = '".$logradouro."', bairro = '".$bairro."', cidade = '".$cidade."', uf = '".$uf."',
  numero = ".$numero.", complemento = '".$complemento."', telefone = '".$telefone."',
   dataNasc = '".date('Y-m-d', strtotime($dataNasc))."', salario = ".$salario.", tipoContrato = '".$tipoContrato."'
    where id_colaborador = '".$id_colaborador."'";

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