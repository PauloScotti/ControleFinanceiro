<?php
include 'conecta.php'; 
include 'testelogado.php';

$id = $_GET['id_colaborador'];

$sql = "delete from colaboradores where id_colaborador = ".$id."";
 
if ($conn->query($sql) === TRUE) {
    echo "Registro apagado com sucesso";
	header('Location: listar_colaboradores.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>