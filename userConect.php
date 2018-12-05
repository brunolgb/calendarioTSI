<?php
	$comandoUser = "SELECT idUser,nomeUser FROM usuario";
	$query2 = mysqli_query($conexao,$comandoUser);
	while ($b = mysqli_fetch_array($query2))
	{
		if ($usuarioCad == $b['idUser'])
		{
			echo strstr($b['nomeUser']," ",true)."";
		}
	}
?>