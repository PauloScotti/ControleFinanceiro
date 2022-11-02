<?php

include ('testelogado.php');

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/bootstrap.css" >
<script src="https://kit.fontawesome.com/40d2a485b6.js" crossorigin="anonymous"></script>

	<title>Listagem de Usuários</title>

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


<div class="container" style="margin-top: 40px">
		
<h3>Lista de Usuários</h3>
<button class='btn btn-primary' data-toggle='modal' data-target='.bd-example-modal-xl'>Cadastrar usuários</button>
<!--<a class="btn btn-primary" style="text-align: left" href="cadastra_usuarios.php" role="button">Cadastrar usuários</a>-->

<br>	
<br>
		<table class="table table-sm">
			<thead>
				<tr>
					<th scope="col">ID</th>
					<th scope="col">Usuário</th>
					<th scope="col">E-mail</th>
					<th scope="co1">Ação</th>
				</tr>
			</thead>
		<tbody>


<?php
include 'conecta.php'; 

$sql = "SELECT * FROM usuarios";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row


    while($row = $result->fetch_assoc()) {

        echo "<td> " . $row["id"]. "</td> 
		<td>" . $row["nome"]. "</td> 
		<td>" . $row["email"]. "</td> 
		<td><a class='btn btn-warning btn-sm' href='editar_usuario.php?id=".$row["id"]." 'role='button''>
		<i class='far fa-edit'></i>&nbsp;Editar</a>
		<a class='btn btn-danger btn-sm' href='excluir_usuario.php?id=".$row["id"]." 'data-confirm='Deseja excluir esse registro?' 'role='button''>
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

<form action="inserir_usuarios.php" method="post" style="margin-top: 20px">
		<div class="form-group">
		<label>Nome do Usuário</label>
		<input type="text" class="form-control" name="nome" placeholder="Insira o nome do usuário" autocomplete="off" required>
		</div>
		
		<div class="form-group">
		<label>E-mail</label>
		<input type="email" class="form-control" name="email" placeholder="Insira o e-mail do usuário" autocomplete="off" required>
		</div>

		<div class="form-group">
		<label>Senha</label>
		<input type="password" class="form-control" name="senha" placeholder="Insira a senha do usuário" autocomplete="off" required>
		</div>

		<div class="form-group">
		<label>Nível de Acesso</label>
		<select class="form-control" name="niveis_acesso_id">
			<?php
			include 'conecta.php'; 
			include 'testelogado.php';

			$sql = "SELECT * FROM niveis_acessos";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {

				while($row = $result->fetch_assoc()) {

					echo "<option>" . $row["niveis_acesso_id"]. "</option>";

				}
			} else {
				echo "0 results";
			}
			$conn->close();
			?>

		</select>
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