<?php
print_r($_POST); 
$usuario = $_POST["usuario"]; 
$senha = $_POST["senha"]; 

$usuarios = array(
    array('id' => 1, 'usuario' => 'admin', 'senha' => '1234'),
    array('id' => 2, 'usuario' => 'Carol', 'senha' => '1234'),
    array('id' => 3, 'usuario' => 'Paulo', 'senha' => '1234'),
);

$valido=false; 
foreach($usuarios as $user){
	if (($user['usuario'] == $usuario) && ($user['senha'] == $senha)) 
	{   $valido=true; 
	}
}
session_start();
if ($valido==true)
  {

		$_SESSION["logado"]= true;
		$_SESSION["usuario"]= $usuario;
	
	header('Location: listar_clientes.php');
  }
else
	{
	
	$_SESSION["logado"]= false;
	header('Location: index.php?login=erro');
		
	}
	
?>