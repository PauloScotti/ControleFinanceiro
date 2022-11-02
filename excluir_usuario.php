<?php
include 'conecta.php'; 
include 'testelogado.php';

$id = $_GET['id'];

$sql = "delete from usuarios where id = ".$id."";
 
if ($conn->query($sql) === TRUE) {
    echo "Registro apagado com sucesso";
	header('Location: listar_usuarios.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>