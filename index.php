<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pr-br">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="arquivos/estilo.css">
	<link rel="shortcut icon" href="arquivos/icone.png">
	<script src="arquivos/estilo.js"></script>
	<title>Calendário</title>
</head>
<body onload="carregar()">
	<?php
		include("header.php");
		include("conexao.php");

		// pegando para materia
		$buscaUsuario = "SELECT idUser,nomeUser FROM usuario";
		$buscandoUsuario = mysqli_query($conexao,$buscaUsuario);
		
	?>
	<section class="corpo posicao">
		<h3>Selecione o Usuário</h3>
		<form method="post" id="cadMat">
			<div>
				<label for="login">Acesso</label>
				<input type="text" id="login" name="login" placeholder="SELECTIONE O USUARIO" list="userLista">
				<datalist id="userLista">
					<?php
					while ($bm = mysqli_fetch_array($buscandoUsuario))
					{
						$idUser = $bm['idUser'];
						$nomeUser = $bm['nomeUser'];
						echo "<option value='".$idUser." | ".$nomeUser."'></option>";
					}
					?>
				</datalist>
			<div>
				<input type="submit" name="cadastrar" class="acao" value="Entrar">
			</div>
		</form>
		<?php
	// recebendo dados
	if (isset($_POST['cadastrar']) and !empty($_POST['login']))
	{
		header("refresh:2,url=home.php");
		$idLogin = strstr($_POST['login']," ",true);
		$_SESSION['id'] = $idLogin;
		echo "Entrando ...";
	}
	else if(isset($_POST['cadastrar']) and empty($_POST['login']))
	{
		echo "Selecione um usuario";
	}
	?>
	</section>
	
</body>
</html>