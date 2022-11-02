<?php
include 'testelogado.php';

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
	<title>Formulário de Cadastro</title>

<link rel="stylesheet" href="css/bootstrap.min.css" >

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
<script src="script.js"></script>
</head>

<body>
	
	<div class="container" id="tamanhoContainer" style="margin-top: 40px">
	<h4>Formulário de Cadastro</h4>
	
	<form action="inserir_colaborador.php" method="post" style="margin-top: 20px">
		<div class="form-group">
		<label>Nome</label>
		<input type="text" class="form-control" name="nome" placeholder="Insira o nome do Colaborador" autocomplete="off" required>
		</div>
		
		<div class="form-group">
		<label>CPF</label>
		<input type="text" class="form-control" name="cpf" placeholder="CPF" autocomplete="off" required>
		</div>

		<div class="form-group">
		<label>E-mail</label>
		<input type="email" class="form-control" name="email" placeholder="Insira o e-mail do colaborador" autocomplete="off" required>
		</div>

        <div class="form-group">
		<label>CEP</label>
		<input type="text" class="form-control" name="cep" id="cep" placeholder="CEP do Colaborador" autocomplete="off" required onblur="pesquisacep(this.value);">
		</div>

		<div class="form-group">
		<label>Rua</label>
		<input type="text" class="form-control" name="logradouro" id="rua" placeholder="Rua" autocomplete="off" required>
		</div>

		<div class="form-row">
		<div class="form-group col-md-6">
		<label>Bairro</label>
		<input type="text" class="form-control" name="bairro" id="bairro" placeholder="Bairro" autocomplete="off" required>
		</div>

		<div class="form-group col-md-3"">
		<label>Cidade</label>
		<input type="text" class="form-control" name="cidade" id="cidade" placeholder="Cidade" autocomplete="off" required>
		</div>

		<div class="form-group col-md-3"">
		<label>Estado</label>
		<input type="text" class="form-control" name="uf" id="uf" placeholder="Estado" autocomplete="off" required>
		</div>
		</div>

        <div class="form-row">
		<div class="form-group col-md-6">
		<label>Número</label>
		<input type="number" class="form-control" name="numero" placeholder="Número" autocomplete="off" required>
		</div>

        <div class="form-group col-md-6"">
		<label>Complemento</label>
		<input type="text" class="form-control" name="complemento" placeholder="Complemento ex: Apto 12" autocomplete="off" required>
		</div>
		</div>

		<div class="form-row">
		<div class="form-group col-md-6">
		<label>Telefone</label>
		<input type="text" class="form-control" name="telefone" placeholder="Insira o telefone do Colaborador" autocomplete="off" required>
		</div>

		<div class="form-group col-md-6"">
		<label>Data de Nascimento</label>
		<input type="date" class="form-control" name="dataNasc" placeholder="Insira data de nascimento" autocomplete="off" required>
		</div>
		</div>
		
		<div class="form-group">
		<label>Salário</label>
		<input type="number" class="form-control" name="salario" placeholder="Insira o salário do Colaborador" autocomplete="off" required>
		</div>


		<div style="text-align: right;">
			<button id="botao" type="submit" class="btn btn-sm">Cadastrar</button>
			<button id="botao" type="reset" class="btn btn-sm">Limpar</button>
		</div>
	</form>
	</div>

<script src="js/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/funcoes.js"></script>
</body>
</html>