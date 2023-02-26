<html>
    <head>
        <title>OtaKompany</title>
		<link rel="icon" type="image/x-icon" href="/blaaa/fav.ico">
		<link href="CSS/site.css" type="text/css" rel="stylesheet" />
		
	</head>
	
<body>
	<?php
		// iniciar uma sessão
		session_start();

		if (empty($_SESSION['email'])){
			// Logado??? Não?? Tchau, bb.
			header('Location: sair.php');
			exit();
		} else { ?>
			<div class="">
			<div class="">
			<a href="sair.php">Sair</a>
		</div>
				<div class="">
					<div class="">
					<span class="">Bem vindo, <?PHP echo $_SESSION['nomeUsuario'] ?></span>
					<br>
					<p class=""> Acesse o seu perfil: </p>
					<a href="perfil.php">Perfil</a>
					</div>
					
	</div> <!--esquerda -->
	<div class="">
		<form method="post" action="gravarMensagem.php" id="formGravarMsg" name="formGravarMsg" >
			<span style="font-size:20px;"></span><br>
			<input type="text" name="mensagem" id="mensagem" required>

					<br>
										
			<select name="pesquisaAmigos">
			<option value="0">Amigos</option> 
			
					
			<?php 
			include_once "banco.php";

			$conn = con();

			if ($conn->connect_errno) {
				echo "Failed to connect to MySQL: " .$conn->connect_error;
				exit();
			} else {
				$sql="SELECT `idUsuario`, `idAmigos`
				FROM `rede`.`amigos`
				WHERE `idUsuario`='".$_SESSION['idUsuario']."';";
			
			$resultado = $conn->query($sql);
													
			while($menu = mysqli_fetch_array($resultado)){
				$sql2="SELECT
							`nomeUsuario`
						FROM
							`rede`.`usuario`
						WHERE
							`idUsuario` = '". $menu[1] ."';";

				$resultado2 = mysqli_query($conn, $sql2);
					if($resultado2->num_rows != 0)
					{
						$row2 = $resultado2 -> fetch_array();
						echo "<option value=".$menu[1].">".$row2['0']."</option>";
					}
				}
			 
			}	
				mysqli_close($conn);
			?> 
			</select>
		<input class="btnEnvio" type="image" src="btn.png" action="submit" />
		</form>
		
		<div>
		<?php
			
			echo "<hr class='rounded'>";
			echo "<br>";
			
			include_once "banco.php";

			$conn = con();

			if ($conn -> connect_errno) {
				echo "Failed to connect to MySQL: " . $conn->connect_error;
				exit();
			} else {
				$sql="SELECT `mensagem`, `id_enviou`, `dataEnvio`
					FROM `rede`.`mensagens`
					WHERE `id_destino` = '".$_SESSION['idUsuario']."'
					AND `ativo` = 's'
					ORDER BY dataEnvio;";

				$resultado = mysqli_query($conn, $sql);
				
				while($recebidas = mysqli_fetch_array($resultado)) {
					echo "Mensagem: ".$recebidas[0]."<br>";
					echo "Data Recebimento: ".$recebidas[2]."<br>";
					
					$sql2="SELECT
							`nomeUsuario`
						FROM
							`rede`.`usuario`
						WHERE
							`idUsuario` = '". $recebidas[1] ."';";

				$resultado2 = mysqli_query($conn, $sql2);
					if($resultado2->num_rows != 0)
					{
						$row2 = $resultado2 -> fetch_array();
						echo "Remetente : ".$row2[0]."<br>";
					}
					echo "-----------------------------------------------------------";
					echo "<br>";
				}
				mysqli_close($conn);
			}

		?>
		</div>
				</div>		
					
					
				<?PHP
			}
		?>
		
		
	</div>
	<form action="pesquisaAmigos.php" method="post"> 
	  <label for="pesquisa"><b>Pesquisar amigos</b></label><br>
      <input type="text" placeholder="Insira o nome" name="psq" required>
	  <input type="submit" value="Buscar"  />
				

	</form>
	</body>
</html>
