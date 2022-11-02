<?php

include 'conecta.php';
include 'testelogado.php';

$id = $_GET['id'];
$sql = "SELECT id, nome, email, senha, niveis_acesso_id FROM usuarios where id=".$id;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
	$row = $result->fetch_assoc();
	$id = $row["id"];
	$nome = $row["nome"];
	$email = $row["email"];
	$senha = $row["senha"];
	$niveis_acesso_id = $row["niveis_acesso_id"];

} else {
    echo "0 results";
	die("ERRO");
}
$conn->close(); 
?>
<html>
<head>
	<title>Editar Usuário</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/bootstrap.css" >


</head>
<body>
	
	<div class="container" id="tamanhoContainer" style="margin-top: 40px">
	<h4>Formulário de Atualização</h4>
	
	<form action="atualizar_usuario.php" method="post" style="margin-top: 20px">
		<div class="form-group">
		<label>ID do Usuário</label>
		<input type="hidden" class="form-control" name="id" value="<?php echo $id ?>">
		</div>

		<div class="form-group">
		<label>Nome</label>
		<input class="form-control" name="nome" value="<?php echo $nome ?>">
		</div>
		
		<div class="form-group">
		<label>E-mail</label>
		<input class="form-control" name="email" value="<?php echo $email ?>">
		</div>

		<div class="form-group">
		<label>Senha</label>
		<input type="password" class="form-control" name="senha" value="<?php echo $senha ?>">
		</div>

        <div class="form-group">
		<label>Nível de Acesso</label>
		<input class="form-control" name="niveis_acesso_id" value="<?php echo $niveis_acesso_id ?>">
		</div>
		
		<div style="text-align: right;">
			<button id="botao" type="submit" class="btn btn-sm">Atualizar</button>
			<a id="botao" class="btn btn-sm" href="listar_usuarios.php" role="button">Listar Usuários</a>
		</div>
	</form>
	</div>

	<?php include 'footer.php'; ?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>