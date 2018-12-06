<!DOCTYPE html>
<html lang="pr-br">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="arquivos/estilo.css">
	<link rel="shortcut icon" href="arquivos/icone.png">
	<script src="arquivos/estilo.js"></script>
	<title>Calendário</title>
</head>
<body onload="carregar('evento')">
	<?php
		include("header.php");
		include("conexao.php");

		$geral = array();
		// pegando para materia
		$buscaMateria = "SELECT * FROM materia";
		$buscandoMateria = mysqli_query($conexao,$buscaMateria);
		
	?>
	<h3>Você esta em Eventos</h3>
	<button class="botoesGeral cadastrarEvento">+ Cadastrar</button>
	<section class="corpo">
		<h3>Cadastrar novos eventos</h3>
		<form method="post" id="cadMat">
			<div>
				<label for="materia">Matéria</label>
				<input type="text" id="materia" name="materia" placeholder="Digite uma matéria" list="materiaLista">
				<datalist id="materiaLista">
					<?php
					while ($bm = mysqli_fetch_array($buscandoMateria))
					{
						$idMateria = $bm['idMat'];
						$nomeMateria = $bm['nomeMat'];
						$geral[$idMateria] = $nomeMateria;
						echo "<option value='".$idMateria." | ".$nomeMateria."'></option>";
					}
					?>
				</datalist>
			</div>
			<div>
				<label for="evento">Evento</label>
				<select id="evento" name="evento">
					<option disabled="" selected="">-- Escolha --</option>
					<option value="prova">prova</option>
					<option value="questionario">questionario</option>
					<option value="reuniao">reuniao</option>
					<option value="forum presencial">forum presencial</option>
					<option value="forum">forum</option>
					<option value="Web Conferencia">Web Conferencia</option>
				</select>
			</div>
			<div>
				<label for="obs">Observação</label>
				<input type="text" id="obs" name="obs" placeholder="Digite uma observação do evento">
			</div>
			<div>
				<label for="data">Data</label>
				<input type="date" id="data" name="data">
			</div>
			<div>
				<label for="hora">Horário</label>
				<input type="time" id="hora" name="hora">
			</div>
			<div>
				<input type="submit" name="cadastrar" class="acao" value="Cadastrar">
				<input type="reset" name="desfazer" class="acao" value="Desfazer">
			</div>
		</form>
	</section>
	<?php
	// recebendo dados
	if (isset($_POST['cadastrar']))
	{
		$materia = strstr($_POST['materia']," ",true);
		$evento = $_POST['evento'];
		$obs = $_POST['obs'];
		$data = $_POST['data'];
		$hora = $_POST['hora'];
		
		// cadastrando
		$cadastrar = "INSERT INTO evento (nomeEvento,materia,dataEvento,horasEvento,obs,userCadastrou,dateCadastrou) VALUES ";
		$cadastrar .= "('$evento','$materia','$data','$hora','$obs','$id','$dataAgora')";
		mysqli_query($conexao,$cadastrar);
	}
	
	?>
	<table class="resultado">
		<thead>
			<tr>
				<td class="larg5">id</td>
				<td  class="larg10">Evento</td>
				<td class="larg30">Matéria</td>
				<td  class="larg10">Data</td>
				<td>Horário</td>
				<td class="larg20">Observação</td>
				<td class="larg10">Usuário</td>
				<td class="larg10">Cadastro</td>
				<td>Ação</td>
			</tr>
		</thead>
		<tbody>
			
		</tbody>
	</table>
	<div class="msgInfoPadrao">
	</div>
</body>
</html>