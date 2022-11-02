<?php

include 'conecta.php';
include 'testelogado.php';

$id_cliente = $_GET['id_cliente'];
$sql = "SELECT * FROM clientes where id_cliente =".$id_cliente;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
	$row = $result->fetch_assoc();
	$id_cliente = $row["id_cliente"];
	$situacao = $row["situacao"];
	$cnpj = $row["cnpj"];
    $inscricaoEstadual = $row["inscricaoEstadual"];
    $inscricaoMunicipal = $row["inscricaoMunicipal"];
    $razaoSocial = $row["razaoSocial"];
    $nomeFantasia = $row["nomeFantasia"];
    $clienteAssociado = $row["clienteAssociado"];
	$valorContrato = $row["valorContrato"];
	$dataInicioContrato = $row["dataInicioContrato"];
	$dataFimContrato = $row["dataFimContrato"];

} else {
    echo "0 results";
	die("ERRO");
}
$conn->close(); 
?>
<html>
<head>
	<title>Editar Cliente</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/bootstrap.css" >


</head>
<body>
	
	<div class="container" id="tamanhoContainer" style="margin-top: 40px">
	<h4>Formulário de Atualização</h4>
	
	<form action="atualizar_clientes.php" method="post" style="margin-top: 20px">
		<div class="form-group">
		<input type="hidden" class="form-control" name="id_cliente" value="<?php echo $id_cliente ?>">
		</div>

		<div class="form-row">
		<div class="form-group col-md-6">
		<label>Situação do Cliente</label>
			<select class="form-control" name="situacao">
				<option value="Ativo" selected value="<?= $situacao ?>"><?= $situacao ?></option>
				<?php
				if($situacao == "Ativo"){
					echo "<option value='Suspenso'>Suspenso</option>";
					echo "<option value='Cancelado'>Cancelado</option>";
				} else if($situacao == "Suspenso") {
					echo "<option value='Ativo'>Ativo</option>";
					echo "<option value='Cancelado'>Cancelado</option>";
				} else {
					echo "<option value='Ativo'>Ativo</option>";
					echo "<option value='Suspenso'>Suspenso</option>";
				}
				?>
			</select>
		</div>

		<div class="form-group col-md-6">
		<label>CNPJ do Cliente</label>
		<input class="form-control" name="cnpj" value="<?php echo $cnpj ?>">
		</div>
		</div>
		
		<div class="form-row">
		<div class="form-group col-md-6">
		<label>Inscrição Estadual</label>
		<input class="form-control" name="inscricaoEstadual" value="<?php echo $inscricaoEstadual ?>">
        </div>
        
        <div class="form-group col-md-6">
		<label>Inscrição Municipal</label>
		<input class="form-control" name="inscricaoMunicipal" value="<?php echo $inscricaoMunicipal ?>">
		</div>
		<div>
        
        <div class="form-group">
		<label>Razão Social</label>
		<input class="form-control" name="razaoSocial" value="<?php echo $razaoSocial ?>">
        </div>
        
        <div class="form-group">
		<label>Nome Fantasia</label>
		<input class="form-control" name="nomeFantasia" value="<?php echo $nomeFantasia ?>">
        </div>
        
        <div class="form-group">
		<label>Cliente Associado</label>
		<input class="form-control" name="clienteAssociado" value="<?php echo $clienteAssociado ?>">
		</div>

		<div class="form-group">
		<label>Valor do Contrato</label>
		<input class="form-control" name="valorContrato" value="<?php echo $valorContrato ?>">
		</div>

		<div class="form-row">
		<div class="form-group col-md-6">
		<label>Data de Início</label>
		<input class="form-control" type="date" name="dataInicioContrato" value="<?php echo $dataInicioContrato ?>">
		</div>

		<div class="form-group col-md-6">
		<label>Data de Término</label>
		<input class="form-control" type="date" name="dataFimContrato" value="<?php echo $dataFimContrato ?>">
		</div>
		<div>
		
		<div style="text-align: right;">
			<button id="botao" type="submit" class="btn btn-sm">Atualizar</button>
			<a id="botao" class="btn btn-sm" href="listar_clientes.php" role="button">Listar Clientes</a>
		</div>
	</form>
	</div>

	<?php include 'footer.php'; ?>

<script src="js/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>