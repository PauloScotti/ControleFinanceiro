<?php
include 'testelogado.php';
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
	<title>Formulário de Cadastro</title>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" >

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
	
	<form action="inserir_fornecedor.php" method="post" style="margin-top: 20px">
		<div class="form-group">
		<label>CNPJ</label>
		<input type="text" class="form-control" name="cnpj" placeholder="Insira o nome do fornecedor" autocomplete="off" required>
		<label>Fornecedor</label>
		<input type="text" class="form-control" name="nome_fornecedor" placeholder="Insira o nome do fornecedor" autocomplete="off" required>
		<label>Razão Social</label>
		<input type="text" class="form-control" name="razaoSocial" placeholder="Insira o nome do fornecedor" autocomplete="off" required>
		<label>Valor do Contrato</label>
		<input type="text" class="form-control" name="valorContrato" placeholder="Insira o nome do fornecedor" autocomplete="off" required>
		</div>
		<div style="text-align: right;">
			<button id="botao" type="submit" class="btn btn-sm">Cadastrar</button>
			<button id="botao" type="reset" class="btn btn-sm">Limpar</button>
		</div>
	</form>
	</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>