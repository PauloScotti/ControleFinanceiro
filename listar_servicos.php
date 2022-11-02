<?php

include ('menu.php');
include 'conecta.php'; 

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/bootstrap.css" >
<script src="https://kit.fontawesome.com/40d2a485b6.js"></script>
</head>
	<title>Listagem de Serviços</title>
<body>

<div class="container p-3 mb-2 bg-light text-dark card text-center" style="margin-top: 40px">
		
<h3>Lista de Serviços</h3>
<br>

<?php

		$countDigital = mysqli_query($conn, "SELECT count(id_cliente) FROM servicos WHERE digital like 'Sim'");
		$linhasCountDigital = mysqli_num_rows($countDigital);
	
	
		while($linhasCountDigital = mysqli_fetch_array($countDigital)){
			$contadorDigital = $linhasCountDigital['count(id_cliente)'];
				
		}

		$countWeb = mysqli_query($conn, "SELECT count(id_cliente) FROM servicos WHERE web like 'Sim'");
		$linhasCountWeb = mysqli_num_rows($countWeb);
	
	
		while($linhasCountWeb = mysqli_fetch_array($countWeb)){
			$contadorWeb = $linhasCountWeb['count(id_cliente)'];
				
		}

		$countCM = mysqli_query($conn, "SELECT count(id_cliente) FROM servicos WHERE analiseMidia like 'Sim'");
		$linhasCountCM = mysqli_num_rows($countCM);
	
	
		while($linhasCountCM = mysqli_fetch_array($countCM)){
			$contadorCM = $linhasCountCM['count(id_cliente)'];
				
		}

		$countPriint = mysqli_query($conn, "SELECT count(id_cliente) FROM servicos WHERE printscreen like 'Sim'");
		$linhasCountPrint = mysqli_num_rows($countPriint);
	
	
		while($linhasCountPrint = mysqli_fetch_array($countPriint)){
			$contadorPrint = $linhasCountPrint['count(id_cliente)'];
				
		}
		
		$countRTV = mysqli_query($conn, "SELECT count(id_cliente) FROM servicos WHERE multimidia like 'Sim'");
		$linhasCountRTV = mysqli_num_rows($countRTV);
	
	
		while($linhasCountRTV = mysqli_fetch_array($countRTV)){
			$contadorRTV = $linhasCountRTV['count(id_cliente)'];
				
		}

		$countFisico = mysqli_query($conn, "SELECT count(id_cliente) FROM servicos WHERE impresso like 'Sim'");
		$linhasCountFisico = mysqli_num_rows($countFisico);
	
	
		while($linhasCountFisico = mysqli_fetch_array($countFisico)){
			$contadorFisico = $linhasCountFisico['count(id_cliente)'];
				
		}
		
		$countMidias = mysqli_query($conn, "SELECT count(id_cliente) FROM servicos WHERE midiasSociais like 'Sim'");
		$linhasCountMidias = mysqli_num_rows($countMidias);
	
	
		while($linhasCountMidias = mysqli_fetch_array($countMidias)){
			$contadorMidias = $linhasCountMidias['count(id_cliente)'];
				
		}

		$countGrifo = mysqli_query($conn, "SELECT count(id_cliente) FROM servicos WHERE grifo like 'Sim'");
		$linhasCountGrifo = mysqli_num_rows($countGrifo);
	
	
		while($linhasCountGrifo = mysqli_fetch_array($countGrifo)){
			$contadorGrifo = $linhasCountGrifo['count(id_cliente)'];
				
		}
		
		$countRelatorio = mysqli_query($conn, "SELECT count(id_cliente) FROM servicos WHERE relatorioCS like 'Sim'");
		$linhasCountRelatorio = mysqli_num_rows($countRelatorio);
	
	
		while($linhasCountRelatorio = mysqli_fetch_array($countRelatorio)){
			$contadorRelatorio = $linhasCountRelatorio['count(id_cliente)'];
				
		}

	?>
		
		
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Serviço 1', <?= $contadorDigital ?>],
		  ['Serviço 2',    <?= $contadorWeb ?>],
		  ['Serviço 3', <?= $contadorCM ?>],
		  ['Serviço 4', <?= $contadorPrint ?>],
		  ['Serviço 5', <?= $contadorRTV ?>],
		  ['Serviço 6', <?= $contadorFisico ?>],
		  ['Serviço 7', <?= $contadorMidias ?>],
		  ['Serviço 8', <?= $contadorGrifo ?>],
		  ['Serviço 9', <?= $contadorRelatorio ?>]
        ]);

        var options = {
          title: 'Serviços',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
	</script>

		<table class="table table-sm">
			<thead>
				<tr>
                    <th scope="col" class="table-active">Serviço 1</th>
					<th scope="col" class="table-active">Serviço 2</th>
					<th scope="col" class="table-active">Serviço 3</th>
					<th scope="col" class="table-active">Serviço 4</th>
					<th scope="col" class="table-active">Serviço 5</th>
					<th scope="col" class="table-active">Serviço 6</th>
					<th scope="col" class="table-active">Serviço 7</th>
					<th scope="col" class="table-active">Serviço 8</th>
					<th scope="col" class="table-active">Serviço 9</th>
				</tr>
			</thead>
		<tbody>


<?php

$sql = "SELECT * FROM clientes";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row

        echo "<td>", $contadorDigital. "</td>";
		echo "<td>", $contadorWeb. "</td>";
		echo "<td>", $contadorCM. "</td>";
		echo "<td>", $contadorPrint. "</td>";
		echo "<td>", $contadorRTV. "</td>";
		echo "<td>", $contadorFisico. "</td>";
		echo "<td>", $contadorMidias. "</td>";
		echo "<td>", $contadorGrifo. "</td>";
		echo "<td>", $contadorRelatorio. "</td>";
        echo "</tr>";
        echo "</tr>";
}
$conn->close();
?>
	
  </tbody>
</table>

</div>

<div class="container" style="margin-top: 40px">


<?php

if($_SESSION['logado'] == true &&  $_SESSION['usuarioNiveisAcessoId'] == "1"){
			echo 
			"<button class='btn btn-primary' data-toggle='modal' data-target='.bd-example-modal-xl'>Cadastrar serviços</button>";
	//"<a class='btn btn-primary' style='text-align: left' href='cadastra_servicos.php' role='button'>Cadastrar serviços</a>";
}
?>


<input type="submit" id="verServicos" class="btn btn-warning" data-toggle="collapse" data-target="#mostrarServicos" value="Mostrar serviços">
<input type="submit" id="ocultarServicos" class="btn btn-warning" data-toggle="collapse" data-target="#mostrarServicos" value="Ocultar serviços" style="display: none;">

<br>
<br>


<div id="donutchart" style="width: 800px; height: 500px; "class="mx-auto"></div>

<div class="collapse" id="mostrarServicos">

<?php
 
include 'conecta.php';

if($_SESSION['logado'] == true &&  $_SESSION['usuarioNiveisAcessoId'] == "1"){
            echo 
		"<table class='table table-sm' id='lista'>
			<thead>
				<tr>
					<th scope='col'>Cliente</th>Buscar pelo nome do cliente: <input size='8' id='filtro-nome'/><br><br>
					<th scope='col'>Serviço 1</th>
					<th scope='col'>Serviço 2</th>
					<th scope='col'>Serviço 3</th>
					<th scope='col'>Serviço 4</th>
					<th scope='col'>Serviço 5</th>
					<th>Serviço 6</th>
					<th>Serviço 7</th>
					<th>Serviço 8</th>
					<th>Serviço 9</th>	
					<th scope='col'>Ação</th>
				</tr>
			</thead>
		<tbody>";
} else {
	echo 
		"<table class='table'>
			<thead>
				<tr>
					<th scope='col'>Status</th>
					<th scope='col'>Cliente</th>
				</tr>
			</thead>
		<tbody>";
}
?>

<?php


$sql = "SELECT * FROM servicos JOIN clientes where clientes.id_cliente = servicos.id_cliente ORDER BY clienteAssociado";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row


    while($row = $result->fetch_assoc()) {

		if($_SESSION['logado'] == true &&  $_SESSION['usuarioNiveisAcessoId'] == "1"){

		echo "<td> " . $row["clienteAssociado"]. "</td> 
		<td>" . $row["digital"]. "</td> 
		<td>" . $row["web"]. "</td> 
		<td>" . $row["analiseMidia"]  . "
		<td>" . $row["printscreen"] . "</td>
		<td>" . $row["multimidia"] . "</td>
		<td>" . $row["impresso"] . "</td>
		<td>" . $row["midiasSociais"] . "</td>
		<td>" . $row["grifo"] . "</td>
		<td>" . $row["relatorioCS"] . "</td>
		<td><a class='btn btn-warning btn-sm' href='editar_servico.php?id_servico=".$row["id_servico"]." 'role='button''>
		<i class='far fa-edit'></i>&nbsp;Editar</a>
		<a class='btn btn-danger btn-sm' href='excluir_servico.php?id_servico=".$row["id_servico"]." 
		'data-confirm='Deseja excluir esse registro?' 'role='button''>
		<i class='far fa-trash-alt'></i>&nbsp;Excluir</a></td></tr>";
	} else {
		echo "<td> " . $row["situacao"]. "</td> 
		<td>" . $row["clienteAssociado"]. "</td></tr>";
	}
}
} else {
    echo "0 results";
}
$conn->close();
?>
	</tr>
  </tbody>
</table>
	
</div>
<?php include 'footer.php'; ?>
<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl modal-dialog-centered">
		<div class="modal-content">

<div>
<div class="modal-header btn btn-warning">
	<h4 class="modal-title">Formulário de Cadastro</h4>
	<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
</div>
<div class="modal-body">
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
			<a id="botao" class="btn btn-sm" role="button" data-dismiss="modal">Fechar</a>
		</div>
	</form>
	</div>
	</div>
  </div>
</div>
</div>

<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/personalizado.js"></script>
</body>
</html>