<html>
<body>

<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');

include_once "banco.php";

$conn = con();

if ($conn -> connect_errno) {
    echo "Failed to connect MySQL: " . $conn->connect_error;
    exit();
} else{
    $mensagem = $conn->real_escape_string($_POST['mensagem']);
    $id_destino = $conn->real_escape_string($_POST['destino']);

    $sql = "INSERT INTO `rede`. `mensagens`
            (`mensagem`, `id_enviou`,`id_destino`, `dataEnvio`,  `ativo`)
    VALUES
			('".$mensagem."', '".$_SESSION['idUsuario']."','". $id_destino."', '".date('Y-m-d H:i:s')."', 's');";
    
    $resultado = $conn->query($sql);

    $conn->close();
    header('Location: site.php', true, 301);
}
?> 
</body>
</html>