<!DOCTYPE html>
<html lang="pr-br">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="arquivos/estilo.css">
	<link rel="shortcut icon" href="arquivos/icone.png">
	<title>Calendário</title>
</head>
<body onload="carregar('usuario')">
	<?php
		include("header.php");
		include("conexao.php");
	?>
	<h3>Você esta em usuario</h3>
	<button class="botoesGeral cadastrarEvento">+ Cadastrar</button>
	<section class="corpo">
		<h3>Cadastrar novos usuários</h3>
		<form method="post" id="cadMat">
			<div>
				<label for="nome">Nome Completo</label>
				<input type="text" id="nome" name="nome" placeholder="Digite o nome" required="">
			</div>
			<div>
				<label for="nascUser">Data de Nascimento</label>
				<input type="date" id="nascUser" name="nascUser" required="" maxlength="6">
			</div>
		
			<div>
				<button name="cadastrar" class="acao" id="btnCadastro">Cadastrar</button>
			</div>
		</form>
		<?php
			if (isset($_POST['cadastrar']))
			{
				$nome = $_POST['nome'];
				$nascUser = $_POST['nascUser'];

				$cadastrar = "INSERT INTO usuario (nomeUser,nascUser,userCadastrou,dataCadastrou) VALUES ('".$nome."','".$nascUser."','".$id."','".$dataAgora."')";
				// echo $cadastrar;
				mysqli_query($conexao,$cadastrar) or die("erro");
			}
		?>
	</section>
	<table class="resultado">
		<thead>
			<tr>
				<td>id</td>
				<td>Nome de Usuario</td>
				<td>Data de Nascimento</td>
				<td>Usuário Cadastro</td>
				<td>Data do Cadastro</td>
				<td class="larg5">Ação</td>
			</tr>
		</thead>
		<tbody>
		</tbody>
	</table>
	<script src="arquivos/estilo.js"></script>
</body>
</html>