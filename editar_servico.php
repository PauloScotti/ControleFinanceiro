<?php

include 'conecta.php';
include 'testelogado.php';

$id = $_GET['id_servico'];
$sql = "SELECT * FROM servicos JOIN clientes where id_servico=".$id;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
	$row = $result->fetch_assoc();
	$digital = $row["digital"];
	$web = $row["web"];
	$analiseMidia = $row["analiseMidia"];
	$printscreen = $row["printscreen"];
	$multimidia = $row["multimidia"];
	$impresso = $row["impresso"];
	$midiasSociais = $row["midiasSociais"];
	$grifo = $row["grifo"];
	$relatorioCS = $row["relatorioCS"];

} else {
    echo "0 results";
	die("ERRO");
}
$conn->close(); 
?>
<html>
<head>
	<title>Editar Produto</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/bootstrap.css" >

</head>
<body>
	
	<div class="container" id="tamanhoContainer" style="margin-top: 40px">
	<h4>Formulário de Atualização</h4>
	


	<form action="cadastrar_produto.php" method="post" style="margin-top: 20px">
		<div class="form-group">
		<label>Serviço 1</label>
		<select class="form-control" name="digital">
				<option selected value="<?= $digital ?>"><?= $digital ?></option>
				<?php
				if($digital == "Sim"){
					echo "<option value='Não'>Não</option>";
				} else {
					echo "<option value='Sim'>Sim</option>";
				}
				?>
			</select>
		</div>

		<div class="form-group">
		<label>Serviço 2</label>
		<select class="form-control" name="web">
				<option selected value="<?= $web ?>"><?= $web ?></option>
				<?php
				if($web == "Sim"){
					echo "<option value='Não'>Não</option>";
				} else {
					echo "<option value='Sim'>Sim</option>";
				}
				?>
			</select>
		</div>

		<div class="form-group">
		<label>Serviço 3</label>
		<select class="form-control" name="analiseMidia">
				<option selected value="<?= $analiseMidia ?>"><?= $analiseMidia ?></option>
				<?php
				if($analiseMidia == "Sim"){
					echo "<option value='Não'>Não</option>";
				} else {
					echo "<option value='Sim'>Sim</option>";
				}
				?>
			</select>
		</div>

		<div class="form-group">
		<label>Serviço 4</label>
		<select class="form-control" name="printscreen">
				<option selected value="<?= $printscreen ?>"><?= $printscreen ?></option>
				<?php
				if($printscreen == "Sim"){
					echo "<option value='Não'>Não</option>";
				} else {
					echo "<option value='Sim'>Sim</option>";
				}
				?>
			</select>
		</div>

		<div class="form-group">
		<label>Serviço 5</label>
		<select class="form-control" name="multimidia">
				<option selected value="<?= $multimidia ?>"><?= $multimidia ?></option>
				<?php
				if($multimidia == "Sim"){
					echo "<option value='Não'>Não</option>";
				} else {
					echo "<option value='Sim'>Sim</option>";
				}
				?>
			</select>
		</div>

		<div class="form-group">
		<label>Serviço 6</label>
		<select class="form-control" name="impresso">
				<option selected value="<?= $impresso ?>"><?= $impresso ?></option>
				<?php
				if($impresso == "Sim"){
					echo "<option value='Não'>Não</option>";
				} else {
					echo "<option value='Sim'>Sim</option>";
				}
				?>
			</select>
		</div>

		<div class="form-group">
		<label>Serviço 7</label>
		<select class="form-control" name="midiasSociais">
				<option selected value="<?= $midiasSociais ?>"><?= $midiasSociais ?></option>
				<?php
				if($midiasSociais == "Sim"){
					echo "<option value='Não'>Não</option>";
				} else {
					echo "<option value='Sim'>Sim</option>";
				}
				?>
			</select>
		</div>

		<div class="form-group">
		<label>Serviço 8</label>
		<select class="form-control" name="grifo">
				<option selected value="<?= $grifo ?>"><?= $grifo ?></option>
				<?php
				if($grifo == "Sim"){
					echo "<option value='Não'>Não</option>";
				} else {
					echo "<option value='Sim'>Sim</option>";
				}
				?>
			</select>
		</div>

		<div class="form-group">
		<label>Serviço 9</label>
		<select class="form-control" name="relatorioCS">
				<option selected value="<?= $relatorioCS ?>"><?= $relatorioCS ?></option>
				<?php
				if($relatorioCS == "Sim"){
					echo "<option value='Não'>Não</option>";
				} else {
					echo "<option value='Sim'>Sim</option>";
				}
				?>
			</select>
		</div>
		
		
		<div style="text-align: right;">
			<button id="botao" type="submit" class="btn btn-sm">Atualizar</button>
			<a id="botao" class="btn btn-sm" href="listar_servicos.php" role="button">Listar Serviços</a>
		</div>
	</form>
	</div>

	<?php include 'footer.php'; ?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>