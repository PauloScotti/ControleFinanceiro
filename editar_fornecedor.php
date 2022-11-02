<?php

include 'conecta.php';
include 'testelogado.php';

$id = $_GET['id'];
$sql = "SELECT id_fornecedor, cnpj, nome_fornecedor, razaoSocial, valorContrato FROM fornecedor where id_fornecedor=".$id;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
	$row = $result->fetch_assoc();
	$id_fornecedor = $row["id_fornecedor"];
	$cnpj = $row["cnpj"];
	$nome_fornecedor = $row["nome_fornecedor"];
	$razaoSocial = $row["razaoSocial"];
	$valorContrato = $row["valorContrato"];

} else {
    echo "0 results";
	die("ERRO");
}
$conn->close(); 
?>
<html>
<head>
	<title>Editar Fornecedor</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" >
<style type="text/css">

	#tamanhoContainer {
		width: 550px;
	}

	#botao {
		background-color: #FF1188;
		color: #FFFFFF;
		border-radius: 10px;
	}

</style>

</head>
<body>
	
	<div class="container" id="tamanhoContainer" style="margin-top: 40px">
	<h4>Formulário de Atualização</h4>
	
	<form action="cadastrar_fornecedor.php" method="post" style="margin-top: 20px">
		<div class="form-group">
		<label>ID do Fornecedor</label>
		<input type="hidden" class="form-control" name="id_fornecedor" value="<?php echo $id ?>">
		</div>

		<div class="form-group">
		<label>CNPJ do Fornecedor</label>
		<input class="form-control" name="cnpj" value="<?php echo $cnpj ?>">
		</div>
		
		<div class="form-group">
		<label>Nome do Fornecedor</label>
		<input class="form-control" name="nome_fornecedor" value="<?php echo $nome_fornecedor ?>">
		</div>

		<div class="form-group">
		<label>Valor do Contrato</label>
		<input class="form-control" name="valorContrato" value="<?php echo $valorContrato ?>">
		</div>
		
		<div style="text-align: right;">
			<button id="botao" type="submit" class="btn btn-sm">Atualizar</button>
			<a id="botao" class="btn btn-sm" href="listar_fornecedores.php" role="button">Listar Fornecedores</a>
		</div>
	</form>
	</div>

	<?php include 'footer.php'; ?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>