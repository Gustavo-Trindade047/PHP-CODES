<html>
    <body>
		
		<?php
			// iniciar uma sessão
			session_start();
			
			include_once "banco.php";

			$conn = con();

			if ($conn -> connect_errno) {
				echo "Failed to connect to MySQL: " . $conn -> connect_error;
				exit();
			} else {
				// Evita caracteres especiais (SQL Inject)
				$email = $conn -> real_escape_string($_POST['email']);
				$senha = $conn -> real_escape_string($_POST['senha']);

				$sql="SELECT `idUsuario`, `email`, `nomeUsuario` FROM `usuario`
					WHERE `email` = '".$email."'
					AND `senha` = '".md5($senha)."'
					AND ativo = 's';";

				$resultado = $conn->query($sql);
				
				if($resultado->num_rows != 0)
				{
					$row = $resultado -> fetch_array();
					$_SESSION['idUsuario'] = $row[0];
					$_SESSION['email'] = $row[1];
					$_SESSION['nomeUsuario'] = $row[2];
					$conn->close();
					
					header('Location: site.php', true, 301);
					exit();
				} else {
					
					$conn->close();
					header('Location: index.php', true, 301);
				}
				 
			}
		?>
	</body>
</html>