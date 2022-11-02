<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link rel="stylesheet" href="css/bootstrap.css" >-->
    <title>Gráficos</title>
    <?php
 
 include 'conecta.php';

   $resultadoClientes = mysqli_query($conn, "SELECT sum(valorContrato) FROM clientes WHERE situacao like 'Ativo' AND tipoContrato like 'Entrada' ");
   $linhasClientes = mysqli_num_rows($resultadoClientes);


   while($linhasClientes = mysqli_fetch_array($resultadoClientes)){
     $valorCliente = str_replace (',', '.', str_replace ('.', '', $linhasClientes['sum(valorContrato)']));
           
   }
   ?>

 
 <?php

 $resultadoTotal = mysqli_query($conn, "SELECT sum(valorContrato) FROM clientes WHERE situacao like 'Ativo' ");
 $linhasTotal = mysqli_num_rows($resultadoTotal);


 while($linhasTotal = mysqli_fetch_array($resultadoTotal)){
   $valorTotal = str_replace (',', '.', str_replace ('.', '', $linhasTotal['sum(valorContrato)']));
         
 }
 ?>

 <?php

   $resultadoExtras = mysqli_query($conn, "SELECT sum(valorContrato) FROM clientes WHERE situacao like 'Ativo' AND tipoContrato like 'Extras' ");
   $linhasExtras = mysqli_num_rows($resultadoExtras);


   while($linhasExtras = mysqli_fetch_array($resultadoExtras)){
     $valorExtras = str_replace (',', '.', str_replace ('.', '', $linhasExtras['sum(valorContrato)']));
           
   }
   ?>

 <?php
   $resultadoFornecedor = mysqli_query($conn, "SELECT sum(valorContrato) FROM fornecedor ");
   $linhasFornecedor = mysqli_num_rows($resultadoFornecedor);


   while($linhasFornecedor = mysqli_fetch_array($resultadoFornecedor)){
     $valorForn = str_replace (',', '.', str_replace ('.', '', $linhasFornecedor['sum(valorContrato)']));

   }

 ?>

 <?php
 
 $resultadoColaborador = mysqli_query($conn, "SELECT sum(salario) FROM colaboradores");
 $linhasColaborador = mysqli_num_rows($resultadoColaborador);

 while($linhasColaborador = mysqli_fetch_array($resultadoColaborador)){
   $valorColaboradores = str_replace (',', '.', str_replace ('.', '', $linhasColaborador['sum(salario)']));
   $impostos = $valorColaboradores * 1.02;

 }    
 ?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
google.charts.load("current", {packages:['corechart']});
google.charts.setOnLoadCallback(drawChart);
function drawChart() {
var data = google.visualization.arrayToDataTable([
["Element", "Valor", { role: "style" } ],
["Entradas", <?= $valorCliente ?> , "blue"],
["Extras", <?= $valorExtras ?>, "blue"],
["Fornecedores", <?= $valorForn ?>, "red"],
["Colaboradores", <?= $valorColaboradores ?>, "color: red"]
]);

var view = new google.visualization.DataView(data);
view.setColumns([0, 1,
              { calc: "stringify",
                sourceColumn: 1,
                type: "string",
                role: "annotation" },
              2]);

var options = {
  title: 'Resultado do Mês em R$',
width: 800,
height: 500,
bar: {groupWidth: "95%"},
legend: { position: "none" },
};
var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
chart.draw(view, options);
}
</script>

  </head>
  <body>
  <div id="columnchart_values" style="width: 800px; height: 500px; "class="mx-auto"></div>
  
</body>
</html>