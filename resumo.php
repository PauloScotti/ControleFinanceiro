<?php

include ('testelogado.php');
include 'conecta.php'; 


?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/bootstrap.css" >
</head>
	<title>Sistema de Controle Financeiro</title>
<body>


<div class="container p-3 bg-light card text-center" style="margin-top: 40px">
		
<h3>Resumo</h3>
<br>

<table class="table table-sm">
			<thead>
				<tr>
                    <th scope='col' class="table-active">Faturamento Total</th>
                    <th scope='col' class="table-active">Quantidade de Clientes</th>
					<th scope="col" class="table-active">Custo Total</th>
					<th scope="col" class="table-active">Saldo</th>
    
				</tr>
			</thead>
		<tbody>

        <?php
        
            $resultadoClientes = mysqli_query($conn, "SELECT sum(valorContrato) FROM clientes WHERE situacao like 'Ativo'");
            $linhasClientes = mysqli_num_rows($resultadoClientes);
        
        
            while($linhasClientes = mysqli_fetch_array($resultadoClientes)){
                echo '<td class="table-primary"><font color=blue><strong>R$ ', number_format( $linhasClientes['sum(valorContrato)'] , 2, ',', '.' ) . '<br/></font></strong></td>';
                $valorCliente = str_replace (',', '.', str_replace ('.', '', $linhasClientes['sum(valorContrato)']));
                    
            }

        ?>

        <?php
        
            $resultadoEntradasClientes = mysqli_query($conn, "SELECT sum(valorContrato) FROM clientes WHERE situacao like 'Ativo' AND tipoContrato like 'Entrada' ");
            $linhasEntradasClientes = mysqli_num_rows($resultadoEntradasClientes);
        
        
            while($linhasEntradasClientes = mysqli_fetch_array($resultadoEntradasClientes)){
                //echo '<td class="table-primary"><font color=blue><strong>R$ ', number_format( $linhasEntradasClientes['sum(valorContrato)'] , 2, ',', '.' ) . '<br/></font></strong></td>';
                $valorEntradasCliente = str_replace (',', '.', str_replace ('.', '', $linhasEntradasClientes['sum(valorContrato)']));
                    
            }

        ?>

        
        <?php
            $contagemEntradaClientes = mysqli_query($conn, "SELECT count(nomeFantasia) FROM clientes WHERE situacao like 'Ativo' AND tipoContrato like 'Entrada' ");
            $linhasContagemEntradaClientes = mysqli_num_rows($contagemEntradaClientes);
        
        
            while($linhasContagemEntradaClientes = mysqli_fetch_array($contagemEntradaClientes)){
                //echo '<td class="table-primary"><font color=blue><strong>R$ ', number_format( $linhasClientes['sum(valorContrato)'] , 2, ',', '.' ) . '<br/></font></strong></td>';
                $contadorEntradaCliente = str_replace (',', '.', str_replace ('.', '', $linhasContagemEntradaClientes['count(nomeFantasia)']));
                    
            }

        ?>

        <?php
            $resultadoTipoClientes = mysqli_query($conn, "SELECT sum(valorContrato) FROM clientes WHERE situacao like 'Ativo' AND tipoContrato like 'Extras' ");
            $linhasTipoClientes = mysqli_num_rows($resultadoTipoClientes);
        
        
            while($linhasTipoClientes = mysqli_fetch_array($resultadoTipoClientes)){
                //echo '<td class="table-primary"><font color=blue><strong>R$ ', number_format( $linhasClientes['sum(valorContrato)'] , 2, ',', '.' ) . '<br/></font></strong></td>';
                $valorTipoCliente = str_replace (',', '.', str_replace ('.', '', $linhasTipoClientes['sum(valorContrato)']));
                    
            }

        ?>

        <?php
            $contagemTipoClientes = mysqli_query($conn, "SELECT count(nomeFantasia) FROM clientes WHERE situacao like 'Ativo' AND tipoContrato like 'Extras' ");
            $linhasContagemTipoClientes = mysqli_num_rows($contagemTipoClientes);
        
        
            while($linhasContagemTipoClientes = mysqli_fetch_array($contagemTipoClientes)){
                //echo '<td class="table-primary"><font color=blue><strong>R$ ', number_format( $linhasClientes['sum(valorContrato)'] , 2, ',', '.' ) . '<br/></font></strong></td>';
                $contadorTipoCliente = str_replace (',', '.', str_replace ('.', '', $linhasContagemTipoClientes['count(nomeFantasia)']));
                    
            }

        ?>
 
        <?php
        

        $qtdClientes = mysqli_query($conn, "SELECT count(nomeFantasia) FROM clientes WHERE situacao like 'Ativo'");
        $linhasQtdClientes = mysqli_num_rows($qtdClientes);
     
     
        while($linhasQtdClientes = mysqli_fetch_array($qtdClientes)){
             echo '<td class="table-primary"><font color=blue><strong> ', $linhasQtdClientes['count(nomeFantasia)'] . '<br/></font></strong></td>';
             $contagemCliente = $linhasQtdClientes['count(nomeFantasia)'];
                
        }

        ?>

        <?php
            $resultadoFornecedor = mysqli_query($conn, "SELECT sum(valorContrato) FROM fornecedor ");
            $linhasFornecedor = mysqli_num_rows($resultadoFornecedor);
        
        
            while($linhasFornecedor = mysqli_fetch_array($resultadoFornecedor)){
                //echo '<td><font color=red><strong>R$ ', number_format( $linhasFornecedor['sum(valorContrato)'] , 2, ',', '.' ) . '<br/></font></strong></td>';

                $valorForn = str_replace (',', '.', str_replace ('.', '', $linhasFornecedor['sum(valorContrato)']));

            }

        ?>

        <?php
        

            $qtdFornecedores = mysqli_query($conn, "SELECT count(nome_fornecedor) FROM fornecedor");
            $linhasQtdFornecedores = mysqli_num_rows($qtdFornecedores);
        
        
            while($linhasQtdFornecedores = mysqli_fetch_array($qtdFornecedores)){
                $contagemFornecedores = $linhasQtdFornecedores['count(nome_fornecedor)'];
                    
            }

            $resultadoColaboradorCLT = mysqli_query($conn, "SELECT sum(salario) FROM colaboradores WHERE tipoContrato like 'CLT' ");
            $linhasColaboradorCLT = mysqli_num_rows($resultadoColaboradorCLT);
     
     
            while($linhasColaboradorCLT = mysqli_fetch_array($resultadoColaboradorCLT)){

                 $valorColaboradoresCLT = str_replace (',', '.', str_replace ('.', '', $linhasColaboradorCLT['sum(salario)']));
                 $impostos = $valorColaboradoresCLT * 1.02;

			}    
			
            $qtdColaboradoresCLT = mysqli_query($conn, "SELECT count(nome) FROM colaboradores  WHERE tipoContrato like 'CLT' ");
            $linhasQtdColaboradoresCLT = mysqli_num_rows($qtdColaboradoresCLT);
        
        
            while($linhasQtdColaboradoresCLT = mysqli_fetch_array($qtdColaboradoresCLT)){
                $contagemColaboradoresCLT = $linhasQtdColaboradoresCLT['count(nome)'];
                    
            }
            
            $resultadoColaborador = mysqli_query($conn, "SELECT sum(salario) FROM colaboradores");
            $linhasColaborador = mysqli_num_rows($resultadoColaborador);
     
     
            while($linhasColaborador = mysqli_fetch_array($resultadoColaborador)){
                 //echo '<td><font color=red><strong>R$ ', number_format( $linhasColaborador['sum(salario)'] , 2, ',', '.' ) . '<br/></font></strong></td>';

                 $valorColaboradores = str_replace (',', '.', str_replace ('.', '', $linhasColaborador['sum(salario)']));

                 $custoTotal = $valorForn + $valorColaboradores;
                 echo '<td class="table-danger"><font color=red><strong>R$ ', number_format($custoTotal, 2, ',', '.'). '<br/></font></strong></td>';

            }    
        ?>
        
        <?php
        

            $qtdColaboradores = mysqli_query($conn, "SELECT count(nome) FROM colaboradores");
            $linhasQtdColaboradores = mysqli_num_rows($qtdColaboradores);
        
        
            while($linhasQtdColaboradores = mysqli_fetch_array($qtdColaboradores)){
                $contagemColaboradores = $linhasQtdColaboradores['count(nome)'];
                    
            }

        ?>
 
            <?php

            
                $lucro = $valorCliente - $valorForn - $valorColaboradores;

                if($lucro > 0){
                    echo '<td class="table-primary"><font color=blue><strong>R$ ', number_format($lucro, 2, ',', '.'). '<br/></font></strong></td>';
                } else {
                    echo '<td class="table-danger"><font color=red><strong>R$ ', number_format($lucro, 2, ',', '.'). '<br/></font></strong></td>';
                }

    ?>

    </tr>
  </tbody>
</table>
    
<br>
		<table class="table table-sm">
			<thead>
				<tr>
                    <th></th>
                    <th scope='col'>Entradas</th>
                    <th scope="col">Extras</th>
					<th scope="col">Fornecedores</th>
					<th scope="col">Colaboradores</th>
					<th scope="col">Impostos</th>
                    <th></th>
				</tr>
			</thead>
		<tbody>


<?php

$sql = "SELECT * FROM clientes";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row

        echo "<tr><td>Valor</td>";
        echo "<td> R$ ", number_format($valorEntradasCliente, 2, ',', '.'). "</td>";
        echo "<td> R$ ", number_format($valorTipoCliente, 2, ',', '.'). "</td>";
        echo "<td> R$ ", number_format($valorForn, 2, ',', '.'). "</td>";
        echo "<td> R$ ", number_format($valorColaboradores, 2, ',', '.'). "</td>";
		echo "<td> R$ ", number_format($impostos, 2, ',', '.'). "</td>";
        echo "</tr>";
        echo "<tr><td>Quantidade</td>";
        echo "<td>", $contadorEntradaCliente . "</td>";
        echo "<td>", $contadorTipoCliente . "</td>";
        echo "<td>", $contagemFornecedores . "</td>";
        echo "<td>", $contagemColaboradores . "</td>";
        echo "<td>", $contagemColaboradoresCLT . "</td>";
        echo "</tr>";
}
$conn->close();
?>
	
  </tbody>
</table>
	
</div>

<div class="container" style="margin-top: 30px">
    <?php include 'graficos.php'; ?>
</div>

<?php include 'footer.php'; ?>

<script src="js/bootstrap.js"></script>
</body>
</html>