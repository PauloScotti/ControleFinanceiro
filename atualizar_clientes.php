<?php

include 'conecta.php';
include 'testelogado.php';

$id_cliente = $_POST['id_cliente'];
$situacao = $_POST['situacao'];
$cnpj = $_POST['cnpj'];
$inscricaoEstadual = $_POST['inscricaoEstadual'];
$inscricaoMunicipal = $_POST['inscricaoMunicipal'];
$razaoSocial = $_POST['razaoSocial'];
$nomeFantasia = $_POST['nomeFantasia'];
$clienteAssociado = $_POST['clienteAssociado'];
$valorContrato = $_POST['valorContrato'];
$dataInicioContrato = strtr($_REQUEST['dataInicioContrato'], '/', '-');
$dataFimContrato = strtr($_REQUEST['dataFimContrato'], '/', '-');

$sql = "update clientes set situacao = '".$situacao."', cnpj = '".$cnpj."',
 inscricaoEstadual = ".$inscricaoEstadual.", inscricaoMunicipal = ".$inscricaoMunicipal.",
  razaoSocial = '".$razaoSocial."', clienteAssociado = '".$clienteAssociado."',
   valorContrato = ".$valorContrato.",
    dataInicioContrato = '".date('Y-m-d', strtotime($dataInicioContrato))."',
     dataFimContrato = '".date('Y-m-d', strtotime($dataFimContrato))."'
		where id_cliente = '".$id_cliente."'";
if ($conn->query($sql) === TRUE) {
    echo "Cliente atualizado com sucesso!";
	header('Location: listar_clientes.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>