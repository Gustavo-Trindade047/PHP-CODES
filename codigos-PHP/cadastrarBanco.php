<html>	
    <body>
		<?php
			date_default_timezone_set('America/Sao_Paulo');
			
			include_once "banco.php";

			$conn = con();

			if ($conn->connect_errno) {
				echo "Failed to connect to MySQL: " . $conn -> connect_error;
				exit();
			} else {
				// Evita caracteres epsciais (SQL Inject)
				$nomeUsuario = $conn->real_escape_string($_POST['nomeUsuario']);
				$senha = $conn->real_escape_string($_POST['senha']);
				$email = $conn->real_escape_string($_POST['email']);
				$pais = $conn->real_escape_string($_POST['pais']);

				$sql = "INSERT INTO `rede`.`usuario`
							(`nomeUsuario`,`email`, `senha`, `pais`, `dataCadastro`, `ativo`)
						VALUES
							('".$nomeUsuario."','".$email."', '".md5($senha)."','".$pais."', '".date('Y-m-d H:i')."', 's');";

				$resultado = $conn->query($sql);
				
				$conn->close();
				header('Location: index.php', true, 301);
			}
		?>
	</body>
</html>
