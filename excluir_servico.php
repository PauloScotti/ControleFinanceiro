<?php
include 'conecta.php'; 
include 'testelogado.php';

$id = $_GET['id_servico'];

$sql = "delete from servicos where id_servico = ".$id."";
 
if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully";
	header('Location: listar_servicos.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>