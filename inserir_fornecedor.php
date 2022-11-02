<?php

include 'conecta.php';
include 'testelogado.php';

$cnpj = $_POST['cnpj'];
$fornecedor = $_POST['nome_fornecedor'];
$razaoSocial = $_POST['razaoSocial'];
$valorContrato = $_POST['valorContrato'];

$sql = "insert into fornecedor (cnpj, nome_fornecedor, razaoSocial, valorContrato)
VALUES ('".$cnpj."', '".$fornecedor."', '".$razaoSocial."', ".$valorContrato.")";

if ($conn->query($sql) === TRUE) {
    echo "Fornecedor cadastrada com sucesso!";
	header('Location: cadastra_fornecedor.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>