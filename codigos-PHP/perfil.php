<html>
	<head>
		<title> OtaKompany </title>
		<link rel="icon" type="image/x-icon" href="/blaaa/fav.ico">
		<link href="CSS/perfil.css" type="text/css" rel="stylesheet" />
	</head>
    <body>
		
		<?php
			// iniciar uma sessão
			session_start();
			
			include_once "banco.php";

			$conn = con();

			if ($conn -> connect_errno) {
				echo "Failed to connect to MySQL: " . $$conn -> connect_error;
				exit();
			} else {
				$sql="SELECT `nomeUsuario`, `dataCadastro`, `ativo`
					FROM
						`rede`.`usuario`
					WHERE
						`idUsuario` = '".$_SESSION['idUsuario']."';";

				$resultado = $conn->query($sql);
				
				if($resultado->num_rows != 0)
				{
					$row = $resultado -> fetch_array();
					echo "<div class='perfil'> Olá, " . $row[0] . "<br>";
					
					echo "Você fez cadastro no dia: " . $row[1] . "<br>";
					if ($row[2] == 's')
						echo "O seu cadastro está ativo.<br>";
					else
						echo "O seu cadastro está INATIVO.<br> </div>";
					echo "<a href='site.php'>Voltar</a>";
					$conn -> close();
					
					exit();
				} else {
					
					$conn -> close();
					header('Location: index.php', true, 301);
				}
			}
		?>
	</body>
</html>