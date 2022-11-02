<?php

include ('testelogado.php');

?>

<!DOCTYPE html>
<html lang="pt-BR">
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/bootstrap.css" >
<script src="https://kit.fontawesome.com/40d2a485b6.js"></script>
<script src="script.js"></script>

	<title>Listagem de Colaboradores</title>

<style type="text/css">

	#tamanhoContainer {
		width: 750px;
	}

	#botao {
		background-color: #FF1188;
		color: #FFFFFF;
		border-radius: 10px;
	}

</style>

</head>
<body>

<div class="container p-3 mb-2 bg-light text-dark card text-center" style="margin-top: 40px">


<h3>Lista de Colaboradores</h3>
<br>

		<?php
		
		include 'conecta.php'; 

            $resultadoColaboradorCLT = mysqli_query($conn, "SELECT sum(salario) FROM colaboradores WHERE tipoContrato like 'CLT' ");
            $linhasColaboradorCLT = mysqli_num_rows($resultadoColaboradorCLT);
     
     
            while($linhasColaboradorCLT = mysqli_fetch_array($resultadoColaboradorCLT)){

                 $valorColaboradoresCLT = str_replace (',', '.', str_replace ('.', '', $linhasColaboradorCLT['sum(salario)']));
                 $impostos = $valorColaboradoresCLT * 1.02;

			}    
			
			$resultadoColaboradorPJ = mysqli_query($conn, "SELECT sum(salario) FROM colaboradores WHERE tipoContrato like 'PJ' ");
            $linhasColaboradorPJ = mysqli_num_rows($resultadoColaboradorPJ);
     
     
            while($linhasColaboradorPJ = mysqli_fetch_array($resultadoColaboradorPJ)){

                 $valorColaboradoresPJ = str_replace (',', '.', str_replace ('.', '', $linhasColaboradorPJ['sum(salario)']));

            }    

            $qtdColaboradoresCLT = mysqli_query($conn, "SELECT count(nome) FROM colaboradores  WHERE tipoContrato like 'CLT' ");
            $linhasQtdColaboradoresCLT = mysqli_num_rows($qtdColaboradoresCLT);
        
        
            while($linhasQtdColaboradoresCLT = mysqli_fetch_array($qtdColaboradoresCLT)){
                $contagemColaboradoresCLT = $linhasQtdColaboradoresCLT['count(nome)'];
                    
			}
			
			$qtdColaboradoresPJ = mysqli_query($conn, "SELECT count(nome) FROM colaboradores  WHERE tipoContrato like 'PJ' ");
            $linhasQtdColaboradoresPJ = mysqli_num_rows($qtdColaboradoresPJ);
        
        
            while($linhasQtdColaboradoresPJ = mysqli_fetch_array($qtdColaboradoresPJ)){
                $contagemColaboradoresPJ = $linhasQtdColaboradoresPJ['count(nome)'];
                    
            }

		?>
		
		
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['CLT', <?= $contagemColaboradoresCLT ?>],
          ['PJ',    <?= $contagemColaboradoresPJ ?>]
        ]);

        var options = {
          title: 'Colaboradores',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>

		<table class="table table-sm">
			<thead>
				<tr>
                    <th scope="col" class="table-active">Colaboradores PJ</th>
					<th scope="col" class="table-active">Colaboradores CLT</th>
					<th scope="col" class="table-active">Impostos</th>
				</tr>
			</thead>
		<tbody>


<?php

$sql = "SELECT * FROM clientes";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row

        echo "<td> R$ ", number_format($valorColaboradoresPJ, 2, ',', '.'). "</td>";
        echo "<td> R$ ", number_format($valorColaboradoresCLT, 2, ',', '.'). "</td>";
		echo "<td> R$ ", number_format($impostos, 2, ',', '.'). "</td>";
        echo "</tr>";
        echo "<td>", $contagemColaboradoresPJ . "</td>";
        echo "<td>", $contagemColaboradoresCLT . "</td>";
        echo "<td>", $contagemColaboradoresCLT . "</td>";
        echo "</tr>";
}
$conn->close();
?>
	
  </tbody>
</table>

</div>

<div class="container" style="margin-top: 40px">
    
<button class='btn btn-primary' data-toggle='modal' data-target='.bd-example-modal-xl'>Cadastrar colaboradores</button>
<!--<a class="btn btn-primary" style="text-align: left" href="cadastra_colaboradores.php" role="button">Cadastrar colaboradores</a>-->
<input type="submit" id="verColaboradores" class="btn btn-warning" data-toggle="collapse" data-target="#secreto" value="Mostrar colaboradores">
<input type="submit" id="ocultarColaboradores" class="btn btn-warning" data-toggle="collapse" data-target="#secreto" value="Ocultar colaboradores" style="display: none;">

<br>	
<br>

<div id="donutchart" style="width: 800px; height: 500px; "class="mx-auto"></div>

<div class="collapse" id="secreto">
<?php

include 'conecta.php'; 
 
 if($_SESSION['logado'] == true &&  $_SESSION['usuarioNiveisAcessoId'] == "1"){
    $resultado = mysqli_query($conn, "SELECT sum(salario) FROM colaboradores");
    $linhas = mysqli_num_rows($resultado);
 
 
    while($linhas = mysqli_fetch_array($resultado)){
         echo 'Valor total R$ ', number_format( $linhas['sum(salario)'] , 2, ',', '.' ) . '<br/>';
            
            ?>
 
            <?php
		}
 }
	?>
<br>


		<table class="table table-sm">
			<thead>
				<tr>
					<th scope="col">Nome</th>
					<th scope="col">E-mail</th>
                    <th scope="co1">Telefone</th>
                    <th scope="co1">Data de Nascimento</th>
                    <th scope="co1">Salário</th>
					<th scope="co1">Ação</th>
				</tr>
			</thead>
		<tbody>


<?php
include 'conecta.php'; 

$sql = "SELECT * FROM colaboradores ORDER BY nome";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row


    while($row = $result->fetch_assoc()) {

        echo "</td> 
        <td>" . $row["nome"]. "</td> 
        <td>" . $row["email"]. "</td> 
        <td>" . $row["telefone"] = "(".substr($row["telefone"],0,2).") ".substr($row["telefone"],2,-4)."-".substr($row["telefone"],-4). "</td> 
        <td>" . date("d/m/Y", strtotime($row["dataNasc"])) . "</td> 
        <td> R$ " . number_format($row["salario"], 2, ',', '.'). "</td> 
		<td><a class='btn btn-warning btn-sm' href='editar_colaborador.php?id_colaborador=".$row["id_colaborador"]." 'role='button''>
		<i class='far fa-edit'></i>&nbsp;Editar</a>
		<a class='btn btn-danger btn-sm' href='excluir_colaborador.php?id_colaborador=".$row["id_colaborador"]." 'data-confirm='Deseja excluir esse registro?' 'role='button''>
		<i class='far fa-trash-alt'></i>&nbsp;Excluir</a></td></tr>";
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