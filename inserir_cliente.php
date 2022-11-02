<?php

include 'conecta.php';
include 'testelogado.php';

$cnpj = $_POST['cnpj'];
$situacao = $_POST['situacao'];
$inscricaoEstadual = $_POST['inscricaoEstadual'];
$inscricaoMunicipal = $_POST['inscricaoMunicipal'];
$razaoSocial = $_POST['razaoSocial'];
$nomeFantasia = $_POST['nomeFantasia'];
$clienteAssociado = $_POST['clienteAssociado'];
$dataInicioContrato = strtr($_REQUEST['dataInicioContrato'], '/', '-');
$dataFimContrato = strtr($_REQUEST['dataFimContrato'], '/', '-');
$valorContrato = $_POST['valorContrato'];
$tipoContrato = $_POST['tipoContrato'];

$sql = "insert into clientes (cnpj, situacao, inscricaoEstadual, inscricaoMunicipal, razaoSocial, nomeFantasia, clienteAssociado, dataInicioContrato, dataFimContrato, valorContrato, tipoContrato)
VALUES ('".$cnpj."', '".$situacao."', ".$inscricaoEstadual.", ".$inscricaoMunicipal.", '".$razaoSocial."', '".$nomeFantasia."', '".$clienteAssociado."', '".date('Y-m-d', strtotime($dataInicioContrato))."', '".date('Y-m-d', strtotime($dataFimContrato))."', ".$valorContrato.", '".$tipoContrato."')";

if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully";
	header('Location: listar_clientes.php');
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