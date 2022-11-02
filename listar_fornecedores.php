<?php

include ('testelogado.php');

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/bootstrap.css" >
<script src="https://kit.fontawesome.com/40d2a485b6.js"></script>
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
	<title>Listagem de Fornecedores</title>
<body>


<div class="container" style="margin-top: 40px">
		
<h3>Lista de Fornecedores</h3>

<button class='btn btn-primary' data-toggle='modal' data-target='.bd-example-modal-xl'>Cadastrar fornecedor</button>
<!--<a class="btn btn-primary" style="text-align: left" href="cadastra_fornecedor.php" role="button">Cadastrar fornecedor</a>-->

<br>
<br>

<?php
     
    $conn = mysqli_connect('localhost','root','','clientes');
 
 
    $resultado = mysqli_query($conn, "SELECT sum(valorContrato) FROM fornecedor");
    $linhas = mysqli_num_rows($resultado);
 
 
    while($linhas = mysqli_fetch_array($resultado)){
         echo 'Valor total R$ ', number_format( $linhas['sum(valorContrato)'] , 2, ',', '.' ) . '<br/>';
            
            ?>
 
            <?php
        }
	?>

	<br>
	
		<table class="table table-sm">
			<thead>
				<tr>
					<th scope="col">CNPJ</th>
					<th scope="col">Fornecedor</th>
					<th scope="col">Valor do Contrato</th>
					<th scope="co1">Ação</th>
				</tr>
			</thead>
		<tbody>


<?php
include 'conecta.php'; 

$sql = "SELECT * FROM fornecedor";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row


    while($row = $result->fetch_assoc()) {

        echo "<td>" . $row["cnpj"]. "</td> 
		<td>" . $row["nome_fornecedor"]. "</td> 
		<td> R$ " . number_format( $row["valorContrato"] , 2 , ',', '.' ) . "</td> 
		<td><a class='btn btn-warning btn-sm' href='editar_fornecedor.php?id=".$row["id_fornecedor"]." 'role='button''>
		<i class='far fa-edit'></i>&nbsp;Editar</a>
		<a class='btn btn-danger btn-sm' href='excluir_fornecedor.php?id=".$row["id_fornecedor"]." 'data-confirm='Deseja excluir esse registro?' 'role='button''>
		<i class='far fa-trash-alt'></i>&nbsp;Excluir</a></td></tr>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
	
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

<form action="inserir_fornecedor.php" method="post" style="margin-top: 20px">
		<div class="form-group">
		<label>CNPJ</label>
		<input type="text" class="form-control" name="cnpj" placeholder="Insira o nome do fornecedor" autocomplete="off" required>
		<label>Fornecedor</label>
		<input type="text" class="form-control" name="nome_fornecedor" placeholder="Insira o nome do fornecedor" autocomplete="off" required>
		<label>Razão Social</label>
		<input type="text" class="form-control" name="razaoSocial" placeholder="Insira o nome do fornecedor" autocomplete="off" required>
		<label>Valor do Contrato</label>
		<input type="text" class="form-control" name="valorContrato" placeholder="Insira o nome do fornecedor" autocomplete="off" required>
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