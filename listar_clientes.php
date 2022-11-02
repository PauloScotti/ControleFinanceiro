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
	<title>Listagem de Clientes</title>
<body>

<div class="container p-3 mb-2 bg-light text-dark card text-center" style="margin-top: 40px">
		
<h3>Lista de Clientes</h3>
<br>

<?php
		
		        
		$resultadoEntradasClientes = mysqli_query($conn, "SELECT sum(valorContrato) FROM clientes WHERE situacao like 'Ativo' AND tipoContrato like 'Entrada' ");
		$linhasEntradasClientes = mysqli_num_rows($resultadoEntradasClientes);
	
	
		while($linhasEntradasClientes = mysqli_fetch_array($resultadoEntradasClientes)){
			//echo '<td class="table-primary"><font color=blue><strong>R$ ', number_format( $linhasEntradasClientes['sum(valorContrato)'] , 2, ',', '.' ) . '<br/></font></strong></td>';
			$valorEntradasCliente = str_replace (',', '.', str_replace ('.', '', $linhasEntradasClientes['sum(valorContrato)']));
				
		}

		$resultadoTipoClientes = mysqli_query($conn, "SELECT sum(valorContrato) FROM clientes WHERE situacao like 'Ativo' AND tipoContrato like 'Extras' ");
		$linhasTipoClientes = mysqli_num_rows($resultadoTipoClientes);
	
	
		while($linhasTipoClientes = mysqli_fetch_array($resultadoTipoClientes)){
			//echo '<td class="table-primary"><font color=blue><strong>R$ ', number_format( $linhasClientes['sum(valorContrato)'] , 2, ',', '.' ) . '<br/></font></strong></td>';
			$valorExtrasCliente = str_replace (',', '.', str_replace ('.', '', $linhasTipoClientes['sum(valorContrato)']));
				
		}

		$contagemEntradaClientes = mysqli_query($conn, "SELECT count(nomeFantasia) FROM clientes WHERE situacao like 'Ativo' AND tipoContrato like 'Entrada' ");
		$linhasContagemEntradaClientes = mysqli_num_rows($contagemEntradaClientes);
	
	
		while($linhasContagemEntradaClientes = mysqli_fetch_array($contagemEntradaClientes)){
			//echo '<td class="table-primary"><font color=blue><strong>R$ ', number_format( $linhasClientes['sum(valorContrato)'] , 2, ',', '.' ) . '<br/></font></strong></td>';
			$contadorEntradaCliente = str_replace (',', '.', str_replace ('.', '', $linhasContagemEntradaClientes['count(nomeFantasia)']));
				
		}

		$contagemTipoClientes = mysqli_query($conn, "SELECT count(nomeFantasia) FROM clientes WHERE situacao like 'Ativo' AND tipoContrato like 'Extras' ");
		$linhasContagemTipoClientes = mysqli_num_rows($contagemTipoClientes);
	
	
		while($linhasContagemTipoClientes = mysqli_fetch_array($contagemTipoClientes)){
			//echo '<td class="table-primary"><font color=blue><strong>R$ ', number_format( $linhasClientes['sum(valorContrato)'] , 2, ',', '.' ) . '<br/></font></strong></td>';
			$contadorTipoCliente = str_replace (',', '.', str_replace ('.', '', $linhasContagemTipoClientes['count(nomeFantasia)']));
				
		}

	?>
		
		
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Entradas', <?= $contadorEntradaCliente ?>],
          ['Extras',    <?= $contadorTipoCliente ?>]
        ]);

        var options = {
          title: 'Clientes',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
	</script>

		<table class="table table-sm">
			<thead>
				<tr>
                    <th scope="col" class="table-active">Entradas</th>
					<th scope="col" class="table-active">Extras</th>
				</tr>
			</thead>
		<tbody>


<?php

$sql = "SELECT * FROM clientes";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row

        echo "<td> R$ ", number_format($valorEntradasCliente, 2, ',', '.'). "</td>";
        echo "<td> R$ ", number_format($valorExtrasCliente, 2, ',', '.'). "</td>";
        echo "</tr>";
        echo "<td>", $contadorEntradaCliente . "</td>";
        echo "<td>", $contadorTipoCliente . "</td>";
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
	"<button class='btn btn-primary' data-toggle='modal' data-target='.bd-example-modal-xl'>Cadastrar cliente</button>";
	//"<a class='btn btn-primary' style='text-align: left' href='cadastra_clientes.php' role='button'>Cadastrar cliente</a>";
}
?>


<input type="submit" id="verClientes" class="btn btn-warning" data-toggle="collapse" data-target="#mostrarClientes" value="Mostrar clientes">
<input type="submit" id="ocultarClientes" class="btn btn-warning" data-toggle="collapse" data-target="#mostrarClientes" value="Ocultar clientes" style="display: none;">

<br>
<br>


<div id="donutchart" style="width: 800px; height: 500px; "class="mx-auto"></div>

<div class="collapse" id="mostrarClientes">

<?php
 
include 'conecta.php';

 if($_SESSION['logado'] == true &&  $_SESSION['usuarioNiveisAcessoId'] == "1"){
    $resultado = mysqli_query($conn, "SELECT sum(valorContrato) FROM clientes WHERE situacao like 'Ativo'");
    $linhas = mysqli_num_rows($resultado);
 
 
    while($linhas = mysqli_fetch_array($resultado)){
         echo 'Valor total R$ ', number_format( $linhas['sum(valorContrato)'] , 2, ',', '.' ) . '<br/>';
            
		}
 }
	?>
<br>

<?php

if($_SESSION['logado'] == true &&  $_SESSION['usuarioNiveisAcessoId'] == "1"){
            echo 
		"<table class='table table-sm' id='lista'>
			<thead>
				<tr> Buscar pelo nome do <strong>cliente</strong>: <input size='8' id='filtro-nome'/><br><br>
					<th scope='col'>Nome Fantasia</th>
					<th scope='col'>Cliente Associado</th>
					<th scope='col'>Valor do Contrato</th>
					<th scope='col'>Data de Início</th>
					<th scope='col'>Data de Término</th>
					<th scope='col'>Status</th>
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


$sql = "SELECT * FROM clientes ORDER BY nomeFantasia";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row


    while($row = $result->fetch_assoc()) {

		if($_SESSION['logado'] == true &&  $_SESSION['usuarioNiveisAcessoId'] == "1"){

		echo "<td>" . $row["nomeFantasia"]. "</td> 
		<td>" . $row["clienteAssociado"]. "</td> 
		<td> R$ " . number_format( $row["valorContrato"] , 2 , ',', '.' ) . "
		<td>" . date("d/m/Y", strtotime($row["dataInicioContrato"])) . "</td>
		<td>" . date("d/m/Y", strtotime($row["dataFimContrato"])) . "</td>
		<td> " . $row["situacao"]. "</td> 
		<td><a class='btn btn-warning btn-sm' href='editar_cliente.php?id_cliente=".$row["id_cliente"]." 'role='button''>
		<i class='far fa-edit'></i>&nbsp;Editar</a>
		<a class='btn btn-danger btn-sm' href='excluir_cliente.php?id_cliente=".$row["id_cliente"]." 
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
			<a id="botao" class="btn btn-sm" role="button" data-dismiss="modal">Fechar</a>
		</div>
	</form>
	</div>
	</div>
  </div>
</div>




<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/personalizado.js"></script>
</body>
</html>