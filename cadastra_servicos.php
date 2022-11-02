<?php
include 'testelogado.php';

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
	<title>Formulário de Cadastro</title>

<link rel="stylesheet" href="css/bootstrap.ss" >

</head>

<body>
	
	<div class="container" id="tamanhoContainer" style="margin-top: 40px">
	<h4>Formulário de Cadastro</h4>
	
	<form action="inserir_servicos.php" method="post" style="margin-top: 20px">

		<div class="form-group">
		<label>Nome do Cliente</label>
			<select class="form-control" name="id_cliente" value="<?php echo $id_cliente ?>">
				<?php
                    include 'conecta.php'; 
                    include 'testelogado.php';

                    $sql = "SELECT * FROM clientes WHERE tipoContrato like 'Entrada'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        // output data of each row


                        while($row = $result->fetch_assoc()) {

							echo "<option value=" . $row["id_cliente"]. ">" . $row["nomeFantasia"]. "</option>";
                            
                        }
                    } else {
                        echo "0 results";
                    }
                    $conn->close();
                    ?>
			</select>
		</div>
		
		<div class="form-row">
		<div class="form-group col-md-4">
		<label>Serviço 1</label>
			<select class="form-control" name="digital">
				<option value="Sim" selected>Sim</option>
				<option value="Não">Não</option>
			</select>
		</div>

		<div class="form-group col-md-4">
		<label>Serviço 2</label>
			<select class="form-control" name="web">
				<option value="Sim" selected>Sim</option>
				<option value="Não">Não</option>
			</select>
		</div>

        <div class="form-group col-md-4">
		<label>Serviço 3</label>
			<select class="form-control" name="analiseMidia">
				<option value="Não" selected>Não</option>
				<option value="Sim">Sim</option>
			</select>
		</div>
        </div>

        <div class="form-row">
        <div class="form-group col-md-4">
		<label>Serviço 4</label>
			<select class="form-control" name="printscreen">
				<option value="Não" selected>Não</option>
				<option value="Sim">Sim</option>
			</select>
		</div>

		<div class="form-group col-md-4">
		<label>Serviço 5</label>
			<select class="form-control" name="multimidia">
            <option value="Não" selected>Não</option>
				<option value="Sim">Sim</option>
			</select>
		</div>

        <div class="form-group col-md-4">
		<label>Serviço 6</label>
			<select class="form-control" name="midiasSociais">
                <option value="Não" selected>Não</option>
				<option value="Sim">Sim</option>
			</select>
		</div>
        </div>

        <div class="form-row">
        <div class="form-group col-md-4">
		<label>Serviço 7</label>
			<select class="form-control" name="grifo">
                <option value="Não" selected>Não</option>
				<option value="Sim">Sim</option>
			</select>
		</div>

        <div class="form-group col-md-4">
		<label>Serviço 8</label>
			<select class="form-control" name="relatorioCS">
                <option value="Não" selected>Não</option>
				<option value="Sim">Sim</option>
			</select>
		</div>

        <div class="form-group col-md-4">
		<label>Serviço 9</label>
			<select class="form-control" name="impresso">
                <option value="Não" selected>Não</option>
				<option value="Sim">Sim</option>
			</select>
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