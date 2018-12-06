<?php
	class alterar
	{
		function buscando($id)
		{
			include("conexao.php");
			$busca = "SELECT * FROM usuario WHERE idUser='".$id."'";
			$buscandoPag = mysqli_query($conexao,$busca);
			while ($e = mysqli_fetch_array($buscandoPag))
			{
				$nomeElemento = $e['nomeUser'];
				echo $nomeElemento;
			}
		}
	}
?>