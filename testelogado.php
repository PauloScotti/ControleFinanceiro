<?php

include ('menu.php');


?>

	<?php
		if ($_SESSION["logado"] == true &&  $_SESSION['usuarioNiveisAcessoId'] == "1")
		{
			//echo '<font face="verdana"">Olá ' . $_SESSION["usuarioNome"] . '</font><br>';
		}
		else
		{
			/*echo 'usuario NAO logado!'; */
			header('Location: index.php?login=erro2');
		}
	?>