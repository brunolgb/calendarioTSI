<?php
	include("conexao.php");
	$nome = $_POST['nome'];
	$nascUser = $_POST['nascUser'];

	$cadastrar = "INSERT INTO usuario (nomeUser,nascUser,dataCadastrou) VALUES ('".$nome."','".$nascUser."','".$dataAgora."')";
	mysqli_query($conexao,$cadastrar);
	echo "bruno bem di";
?>