<html> 
<body>
<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');

include_once "banco.php";

$conn = con();

if ($conn -> connect_errno) {
    echo "Failed to connect to MySQL: " . $conn->connect_error;
    exit();
} else {
    $amigo = $conn->real_escape_string($_POST['amigo']);
    $sql = "INSERT INTO `rede`.`amigos`
							(`idUsuario`,`idAmigos`)
						VALUES
							('".$_SESSION['idUsuario']."','".$amigo."');";
                           
    $resultado = $conn->query($sql);
	
    $conn->close();
   
    header('Location: site.php', true, 301);
}

?>

</body>
</html>