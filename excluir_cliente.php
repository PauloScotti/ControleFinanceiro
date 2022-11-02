<?php
include 'conecta.php'; 
include 'testelogado.php';

$id = $_GET['id_cliente'];

$sql = "delete from clientes where id_cliente = ".$id."";
 
if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully";
	header('Location: listar_clientes.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>