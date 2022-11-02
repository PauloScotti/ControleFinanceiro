<?php
include 'conecta.php'; 

$id_estoque = $_POST['id_estoque'];
$nroproduto = $_POST['nroproduto']; 
$nomeproduto = $_POST['nomeproduto']; 
$categoria = $_POST['categoria']; 
$quantidade = $_POST['quantidade']; 
$fornecedor = $_POST['fornecedor']; 

$sql = "update estoque set nroproduto = '".$nroproduto."', nomeproduto = '".$nomeproduto."', 
		categoria = '".$categoria."', quantidade = '".$quantidade."', fornecedor = '".$fornecedor."'
       where id_estoque = '".$id_estoque."'";
if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully";
	header('Location: listar_produtos.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>