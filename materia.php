<!DOCTYPE html>
<html lang="pr-br">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="arquivos/estilo.css">
	<link rel="shortcut icon" href="arquivos/icone.png">
	<title>Calendário</title>
</head>
<body onload="carregar(),requisicao()">
	<?php
		include("header.php");
		include("conexao.php");
	?>
	<h3>Você esta em Matérias</h3>
	<button class="botoesGeral cadastrarEvento">+ Cadastrar</button>
	<section class="corpo">
		<h3>Cadastrar novos usuários</h3>
		<form method="post" id="cadMat">
			<div>
				<label for="nomeMat">Nome Materia</label>
				<input type="text" id="nomeMat" name="nomeMat" placeholder="Digite o nome" required="">
			</div>
			<div>
				<label for="semestre">Semestre</label>
				<select id="semestre" name="semestre" required="">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option disabled="" selected="">-- Escolha --</option>
				</select>
			</div>
			<div>
				<label for="dataInicio">Data de Inicio</label>
				<input type="date" id="dataInicio" name="dataInicio" required="">
			</div>
			<div>
				<label for="dataFinal">Data de Termino</label>
				<input type="date" id="dataFinal" name="dataFinal" required="">
			</div>
			<div>
				<label for="qtdHoras">Quantidade de Horas</label>
				<input type="number" id="qtdHoras" name="qtdHoras" required="">
			</div>
			<div>
				<button name="cadastrar" class="acao" id="btnCadastro">Cadastrar</button>
			</div>
		</form>
		<?php
			if (isset($_POST['cadastrar']))
			{
				$nomeMat = $_POST['nomeMat'];
				$semestre= $_POST['semestre'];
				$dataInicio= $_POST['dataInicio'];
				$dataFinal= $_POST['dataFinal'];
				$qtdHoras= $_POST['qtdHoras'];

				$cadastrar = "INSERT INTO materia (nomeMat,semestre,dataInicio,dataFinal,qtdHoras,userCadastrou,dateCadastrou) VALUES (";
				$cadastrar .= "'".$nomeMat."','".$semestre."','".$dataInicio."','".$dataFinal."','".$qtdHoras."','".$id."','".$dataAgora."')";
				// echo $cadastrar;
				mysqli_query($conexao,$cadastrar) or die("erro");
			}
		?>
	</section>
	<table class="resultado">
		<thead>
			<tr>
				<td>id</td>
				<td>Nome da Matéria</td>
				<td>Semestre</td>
				<td>Data Inicio</td>
				<td>Data Final</td>
				<td>Total Horas</td>
				<td>Usuario Cadastrou</td>
				<td>Data Cadastrou</td>
				<!-- <td>Ação</td> -->
			</tr>
		</thead>
		<tbody>
		<?php
			$comando = "SELECT * FROM materia";
			$query = mysqli_query($conexao,$comando);
			while ($a = mysqli_fetch_array($query))
			{
				$idMat = $a['idMat'];
				echo "<tr>";
				echo "<td>".$idMat."</td>";
				echo "<td>".$a['nomeMat']."</td>";
				echo "<td>".$a['semestre']."</td>";
				echo "<td>".$a['dataInicio']."</td>";
				echo "<td>".$a['dataFinal']."</td>";
				echo "<td>".$a['qtdHoras']."</td>";
				echo "<td>";
				$usuarioCad = $a['userCadastrou'];
				include("userConect.php");
				echo "</td>";
				echo "<td>".$a['dateCadastrou']."</td>";
				// echo "<td><button value='".$a['idUser']."'>X</button></td>";
				echo "</tr>";
			}
			if ($idMat == null or empty($idMat))
			{
				echo "<tr>";
				echo "<td colspan='8'>Não possui registro</td>";
				echo "</tr>";
			}
		?>
		</tbody>
	</table>
	<script src="arquivos/estilo.js"></script>
</body>
</html>