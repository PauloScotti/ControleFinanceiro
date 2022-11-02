<?php
include 'conecta.php'; 
$id_fornecedor = $_POST['id_fornecedor'];
$cnpj = $_POST['cnpj'];
$nome_fornecedor = $_POST['nome_fornecedor'];
$razaoSocial = $_POST['razaoSocial'];
$valorContrato = $_POST['valorContrato'];

$sql = "update fornecedor set cnpj = '".$cnpj."', nome_fornecedor = '".$nome_fornecedor."', razaoSocial = '".$razaoSocial."', valorContrato = ".$valorContrato."
		where id_fornecedor = '".$id_fornecedor."'";
if ($conn->query($sql) === TRUE) {
    echo "Fornecedor cadastrado com sucesso!";
	header('Location: listar_fornecedores.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>