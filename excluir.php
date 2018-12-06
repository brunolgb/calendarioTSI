<?php
	include("conexao.php");
	$id = $_GET['id'];
	$pagina = $_GET['pagina'];

	// testes para verificar qual pagina é
	if ($pagina == 'usuario')
	{
		$complemento = "idUser";
	}
	if ($pagina == 'materia')
	{
		$complemento = "idMat";
	}
	if ($pagina == 'evento')
	{
		$complemento = "idEvento";
	}
	$apagar = "DELETE FROM ".$pagina." WHERE ".$complemento."='".$id."'";
	mysqli_query($conexao,$apagar);
?>