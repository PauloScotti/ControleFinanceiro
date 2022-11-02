<?php

include 'conecta.php';
include 'testelogado.php';

$id_colaborador = $_GET["id_colaborador"];
$sql = "SELECT * FROM colaboradores where id_colaborador=".$id_colaborador;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
	$row = $result->fetch_assoc();
	$id_colaborador = $row["id_colaborador"];
	$nome = $row["nome"];
    $cpf = $row["cpf"];
    $email = $row["email"];
    $cep = $row["cep"];
	$logradouro = $row["logradouro"];
	$bairro = $row["bairro"];
	$cidade = $row["cidade"];
	$uf = $row["uf"];
    $numero = $row["numero"];
    $complemento = $row["complemento"];
    $telefone = $row["telefone"];
    $dataNasc = $row["dataNasc"];
	$salario = $row["salario"];
	$tipoContrato = $row["tipoContrato"];

} else {
    echo "0 results";
	die("ERRO");
}
$conn->close(); 
?>
<html>
<head>
	<title>Editar Colaborador</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/bootstrap.css" >

<script src="script.js"></script>

</head>
<body>
	
	<div class="container" id="tamanhoContainer" style="margin-top: 40px">
	<h4>Formulário de Atualização</h4>
	
	<form action="atualizar_colaborador.php" method="post" style="margin-top: 20px">
		<div class="form-group">
		<input type="hidden" class="form-control" name="id_colaborador" value="<?php echo $id_colaborador ?>">
		</div>
		
		<div class="form-group">
		<label>Nome</label>
		<input class="form-control" name="nome" value="<?php echo $nome ?>">
		</div>

		<div class="form-group">
		<label>CPF</label>
		<input class="form-control" name="cpf" value="<?php echo $cpf ?>">
		</div>

		<div class="form-group">
		<label>E-mail</label>
		<input class="form-control" name="email" value="<?php echo $email ?>">
		</div>

		<div class="form-group">
		<label>CEP</label>
		<input class="form-control" name="cep" id="cep" value="<?php echo $cep ?>" required onblur="pesquisacep(this.value);">
        </div>

		<div class="form-group">
		<label>Endereço</label>
		<input class="form-control" name="logradouro" id="rua" value="<?php echo $logradouro ?>">
        </div>

		<div class="form-row">
		<div class="form-group col-md-6">
		<label>Bairro</label>
		<input class="form-control" name="bairro" id="bairro" value="<?php echo $bairro ?>">
        </div>

		<div class="form-group col-md-4">
		<label>Cidade</label>
		<input class="form-control" name="cidade" id="cidade" value="<?php echo $cidade ?>">
        </div>

		<div class="form-group col-md-2">
		<label>Estado</label>
		<input class="form-control" name="uf" id="uf" value="<?php echo $uf ?>">
        </div>
		</div>
        
		<div class="form-row">
		<div class="form-group col-md-6">
		<label>Número</label>
		<input class="form-control" name="numero" value="<?php echo $numero ?>">
        </div>
        
		<div class="form-group col-md-6">
		<label>Complemento</label>
		<input class="form-control" name="complemento" value="<?php echo $complemento ?>">
        </div>
		</div>
        
		<div class="form-row">
		<div class="form-group col-md-6">
		<label>Telefone</label>
		<input class="form-control" name="telefone" value="<?php echo $telefone ?>">
        </div>
        
        <div class="form-group col-md-6">
		<label>Data de Nascimento</label>
		<input class="form-control" type="date" name="dataNasc" value="<?php echo $dataNasc ?>">
        </div>
		</div>
        
        <div class="form-row">
		<div class="form-group col-md-6">
		<label>Salário</label>
		<input class="form-control" name="salario" value="<?php echo $salario ?>">
		</div>

		<div class="form-group col-md-6">
		<label>Tipo de Contrato</label>
			<select class="form-control" name="tipoContrato">
				<option value="Ativo" selected value="<?= $tipoContrato ?>"><?= $tipoContrato ?></option>
				<?php
				if($tipoContrato == "CLT"){
					echo "<option value='PJ'>PJ</option>";
				} else {
					echo "<option value='CLT'>CLT</option>";
				}
				?>
			</select>
		</div>

		</div>
        		
		<div style="text-align: right;">
			<button id="botao" type="submit" class="btn btn-sm">Atualizar</button>
			<a id="botao" class="btn btn-sm" href="listar_colaboradores.php" role="button">Listar Colaboradores</a>
		</div>
	</form>
	</div>

	<?php include 'footer.php'; ?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>