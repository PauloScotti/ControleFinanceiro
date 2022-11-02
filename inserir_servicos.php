<?php

include 'conecta.php';
include 'testelogado.php';

$id_cliente = $_POST['id_cliente'];
$digital = $_POST['digital'];
$web = $_POST['web'];
$analiseMidia = $_POST['analiseMidia'];
$printscreen = $_POST['printscreen'];
$multimidia = $_POST['multimidia'];
$impresso = $_POST['impresso'];
$midiasSociais = $_POST['midiasSociais'];
$grifo = $_POST['grifo'];
$relatorioCS = $_POST['relatorioCS'];

$sql = "insert into servicos (id_cliente, digital, web, analiseMidia, printscreen, multimidia, impresso, midiasSociais, grifo, relatorioCS)
VALUES (".$id_cliente.", '".$digital."', '".$web."', '".$analiseMidia."', '".$printscreen."', '".$multimidia."', '".$impresso."', '".$midiasSociais."', '".$grifo."', '".$relatorioCS."')";

if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully";
	header('Location: listar_servicos.php');
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