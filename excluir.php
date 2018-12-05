<?php
	include("conexao.php");
	$id = $_GET['id'];
	$comando = "DELETE FROM evento WHERE idEvento='".$id."'";
	mysqli_query($conexao,$comando) or die("morreu");
	echo "<img src='arquivos/img-success.png'>";
	echo "Excluido com sucesso";
?>