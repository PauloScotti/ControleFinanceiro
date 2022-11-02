<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="imagens/icone_ps.jpg">

    <title>Sistema de Controle Financeiro</title>

    <!-- Principal CSS do Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Estilos customizados para esse template -->
    <link href="css/index.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" action='valida_bd.php' method='post'>
      <img class="mb-4" src="imagens/logo_ps.PNG" alt="">
      <label for="inputUsuario" class="sr-only">Usuário</label>
      <input type="email" id="email" class="form-control" placeholder="E-mail" autocomplete="off" required autofocus name='email'>
      <label for="inputPassword" class="sr-only">Senha</label>
      <input type="password" id="senha" class="form-control" placeholder="Senha" required name='senha'>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="esquecisenha"> Esqueci minha senha
        </label>
      </div>
	  
	    <?php if(isset($_GET['login']) && $_GET['login'] == 'erro'){?>

                <div class="text-danger">
                  ERRO - Usuario Invalido!
                </div>

	    <?php }?>

	    <?php if(isset($_GET['login']) && $_GET['login'] == 'erro2'){?>

                <div class="text-danger">
                  ERRO - Para acecssar efetue o login!
                </div>

	    <?php }?>

      <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
    </form>

</body>
</html>