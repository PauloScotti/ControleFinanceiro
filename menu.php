<!DOCTYPE html>
<html lang="pt-BR">
<html>
<head>
<!--<link rel="stylesheet" href="css/bootstrap.css" >-->
<link rel="stylesheet" href="css/style2.css">
<!--<title>Menu</title>-->

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="imagens/icone_ps.jpg">
</head>
<body>

<div>

 <?php
    session_start();
        if($_SESSION['logado'] == true &&  $_SESSION['usuarioNiveisAcessoId'] == "1"){
            echo 
            "
            <header class='header'>
                <img src='imagens/logo_ps.png'></a>
                <nav>
                <ul class='menu'>
                <li><a href='https://localhost/controlefinanceiro/resumo.php' role='button'>Resumo</a></li>
                <li><a href='https://localhost/controlefinanceiro/listar_clientes.php' role='button'>Clientes</a></li>
                <li><a href='https://localhost/controlefinanceiro/listar_servicos.php' role='button'>Serviços</a></li>
                <li><a href='https://localhost/controlefinanceiro/listar_fornecedores.php' role='button'>Fornecedores</a></li>
                <li><a href='https://localhost/controlefinanceiro/listar_usuarios.php' role='button'>Usuários</a></li>
                <li><a href='https://localhost/controlefinanceiro/listar_colaboradores.php' role='button'>Colaboradores</a></li>
                <li><a href='https://localhost/controlefinanceiro/logout.php' class='sair'>Sair</a><font face='verdana'></li>
                Olá " ?><?php echo $_SESSION['usuarioNome'] ?><?php "</font></ul></nav></section>";
        } elseif ($_SESSION['usuarioNiveisAcessoId'] == "2"){
            echo 
            "<header class='header'>
            <a href='/''><img src='imagens/logo_ps.png'></a>
            <nav>
            <ul class='menu'>
            <li><a href='listar_clientes.php' role='button'>Clientes</a></li>
            <li><a class='sair' href='logout.php'>Sair</a></li>
            <font face='verdana'>Olá " ?><?php echo $_SESSION['usuarioNome'] ?><?php "</font></ul></nav></section>";

        }else{
            echo 
            "<a class='btn btn-primary' style='margin-left: 130px; margin-top:5px;' href='listar_clientes.php' role='button'>Clientes</a>
            <a href='logout.php' style='margin-top:5px' class='btn btn-danger'>Sair</a>
            <font face='verdana'>Olá " ?><?php echo $_SESSION['usuarioNome'] ?><?php "</font>";

        }
?>

</div>

<div class="container" id="confirmacao">
</div>

</body>
</html>

