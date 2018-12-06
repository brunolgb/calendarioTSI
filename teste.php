<!DOCTYPE html>
<html lang="pr-br">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="arquivos/estilo.css">
	<link rel="shortcut icon" href="arquivos/icone.png">
	<title>Calendário</title>
</head>
<body onload="carregar('evento')">
	<?php
		include("header.php");
		require_once "classes.php";

		$alterar = new alterar;
		$nome = $alterar->buscando(9);
		echo $nome;
	?>
	<button class="botao">teste</button>
	<script>
		var elemento = document.querySelector(".botao");
		elemento.onclick = function ()
		{
			
		};
	</script>
</body>
</html>