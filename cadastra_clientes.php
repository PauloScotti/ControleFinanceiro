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
	
	<form action="inserir_cliente.php" method="post" style="margin-top: 20px">
		<div class="form-group">
		<label>Número do CNPJ</label>
		<input type="text" class="form-control" name="cnpj" autocomplete="off" required>
		</div>
		
		<div class="form-row">
		<div class="form-group col-md-6">
		<label>Situação</label>
			<select class="form-control" name="situacao">
				<option value="Ativo" selected>Ativo</option>
				<option value="Suspenso">Suspenso</option>
				<option value="Cancelado">Cancelado</option>
			</select>
		</div>

		<div class="form-group col-md-6">
		<label>Tipo de Contrato</label>
			<select class="form-control" name="tipoContrato">
				<option value="Entrada" selected>Entrada</option>
				<option value="Comunicado">Comunicado</option>
				<option value="Extras">Extras</option>
			</select>
		</div>
		</div>

		<div class="form-row">
		<div class="form-group col-md-6">
		<label>Inscrição Estadual</label>
		<input type="text" class="form-control" name="inscricaoEstadual" value=0 autocomplete="off" required>
		</div>

		<div class="form-group col-md-6">
		<label>Inscrição Municipal</label>
		<input type="text" class="form-control" name="inscricaoMunicipal" value=0 autocomplete="off" required>
		</div>
		</div>

		<div class="form-group">
		<label>Razão Social</label>
		<input type="text" class="form-control" name="razaoSocial" autocomplete="off" required>
		</div>

		<div class="form-group">
		<label>Nome Fantasia</label>
		<input type="text" class="form-control" name="nomeFantasia" autocomplete="off" required>
		</div>
		
		<div class="form-group">
		<label>Cliente Associado</label>
		<input type="text" class="form-control" name="clienteAssociado" autocomplete="off" required>
		</div>

		<div class="form-group">
		<label>Valor do Contrato</label>
		<input type="number" class="form-control" name="valorContrato" autocomplete="off" required>
		</div>

		<div class="form-row">
		<div class="form-group col-md-6">
		<label>Data de Início</label>
		<input type="date" class="form-control" name="dataInicioContrato" autocomplete="off">
		</div>

		<div class="form-group col-md-6">
		<label>Data de Término</label>
		<input type="date" class="form-control" name="dataFimContrato" autocomplete="off">
		</div>
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