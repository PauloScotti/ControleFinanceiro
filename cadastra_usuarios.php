<?php
include 'testelogado.php';
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
	<title>Formulário de Cadastro</title>

<link rel="stylesheet" href="css/bootstrap.css" >

<style type="text/css">

	#tamanhoContainer {
		width: 500px;
	}
	
	#botao {
		background-color: #1E90FF;
		color: #FFFFFF;
		border-radius: 10px;
	}

</style>

</head>

<body>
	
	<div class="container" id="tamanhoContainer" style="margin-top: 40px">
	<h4>Formulário de Cadastro</h4>
	
	<form action="inserir_usuarios.php" method="post" style="margin-top: 20px">
		<div class="form-group">
		<label>Nome do Usuário</label>
		<input type="text" class="form-control" name="nome" placeholder="Insira o nome do usuário" autocomplete="off" required>
		</div>
		
		<div class="form-group">
		<label>E-mail</label>
		<input type="email" class="form-control" name="email" placeholder="Insira o e-mail do usuário" autocomplete="off" required>
		</div>

		<div class="form-group">
		<label>Senha</label>
		<input type="password" class="form-control" name="senha" placeholder="Insira a senha do usuário" autocomplete="off" required>
		</div>

		<div class="form-group">
		<label>Nível de Acesso</label>
		<select class="form-control" name="niveis_acesso_id">
			<?php
			include 'conecta.php'; 
			include 'testelogado.php';

			$sql = "SELECT * FROM niveis_acessos";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {

				while($row = $result->fetch_assoc()) {

					echo "<option>" . $row["niveis_acesso_id"]. "</option>";

				}
			} else {
				echo "0 results";
			}
			$conn->close();
			?>

		</select>
		</div>

		<div style="text-align: right;">
			<button id="botao" type="submit" class="btn btn-sm">Cadastrar</button>
			<button id="botao" type="reset" class="btn btn-sm">Limpar</button>
		</div>
	</form>
	</div>

<script src="js/bootstrap.js"></script>
</body>
</html>