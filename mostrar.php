<?php
	include("conexao.php");
	$comando = "SELECT * FROM evento";
	$query = mysqli_query($conexao,$comando);
	// para mexer nas datas
	function data($valor)
	{
		// meses
		$dia = substr($valor, 8,2);
		$mes = substr($valor, 5,2);
		switch ($mes)
		{
			case 1: $mes = "Jan";break;
			case 2: $mes = "Fev";break;
			case 3: $mes = "Mar";break;
			case 4: $mes = "Abr";break;
			case 5: $mes = "Mai";break;
			case 6: $mes = "Jun";break;
			case 7: $mes = "Jul";break;
			case 8: $mes = "Ago";break;
			case 9: $mes = "Set";break;
			case 10: $mes = "Out";break;
			case 11: $mes = "Nov";break;
			case 12: $mes = "Dez";break;
		}
		$ano = substr($valor, 0,4);
		echo $dia." ".$mes;
	}
	while ($a = mysqli_fetch_array($query))
	{
		$idEvento = $a['idEvento'];
		$acaoBtn = "'".$idEvento."','evento'";
		echo "<tr>";
		echo "<td>".$idEvento."</td>";
		echo "<td>".$a['nomeEvento']."</td>";
		echo "<td>".$geral[$a['materia']]."</td>";
		echo "<td>";
			data($a['dataEvento']);
		echo "</td>";
		echo "<td>".substr($a['horasEvento'],0,5)."</td>";
		echo "<td>".$a['obs']."</td>";
		echo "<td>";
		$usuarioCad = $a['userCadastrou'];
		include("userConect.php");
		echo "</td>";
		echo "<td>";
			data($a['dateCadastrou']);
		echo "</td>";
		echo "<td class='btnAcao'>";
		?>
		<!-- continuando a sequencia -->
		<button onclick="acao(<?php echo $acaoBtn; ?>)" title="Editar"><img src="arquivos/img-edicao.png"></button>
		<button onclick="excluir(<?php echo $idEvento; ?>)" title="Excluir">X</button>
		</td>
		<?php
		echo "</tr>";
	}
	if ($idEvento == null or empty($idEvento))
	{
		echo "<tr>";
		echo "<td colspan='8'>Não possui registro</td>";
		echo "</tr>";
	}
?>