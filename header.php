<?php
	session_start();
	$id = $_SESSION['id'];
	$dataAgora = date("Y-m-d");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="arquivos/estilo.css">
	<link rel="stylesheet" href="arquivos/estilo.js">
</head>
<body>
<header>
	<figure>
		<img src="arquivos/logo.png" alt="logo 'IFMT'">
	</figure>
	<span>
		Calendário TSI
	</span>
	<nav>
		<div class="botaoMenu">
			<div></div>
			<div></div>
			<div></div>
		</div>
		<ul id="menu">
			<li>
				<a href="home.php">Eventos</a>
			</li>
			<li>
				<a href="usuario.php">Usuários</a>
			</li>
			<li>
				<a href="materia.php">Matérias</a>
			</li>
			<li>
				<a href="index.php">Sair</a>
			</li>
		</ul>
	</nav>
</header>
</body>
</html>