<?php
	include("conexao.php");
	$getId = $_GET['id'];
	$getTabela = $_GET['tbl'];
	$campo = "idEvento";
	$busca = "SELECT * FROM ".$getTabela." WHERE ".$campo."='".$getId."'";
	$buscando = mysqli_query($conexao,$busca);
	while ($e = mysqli_fetch_array($buscando))
	{
		$nome = $e['nomeEvento'];
		echo $nome;
	}
	mysqli_close($conexao);
?>