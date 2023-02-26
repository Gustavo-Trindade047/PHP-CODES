<html>
<?php 
session_start();
include_once "banco.php";

$conn = con();

if ($conn -> connect_errno) {
    echo "Failed to connect to MySQL: " . $conn -> connect_error;
    exit();
} else {
    $sql="SELECT `idUsuario`, `nomeUsuario`
		  FROM `rede`.`usuario`
          WHERE `nomeUsuario`LIKE '%".$_POST['psq']."%'"; //porcento serve para "qualquer coisa daquele lado do que foi pesquisado // 
          $resultado = $conn->query($sql);
													
          while($row = mysqli_fetch_array($resultado)){
            echo "<form action='addAmigo.php' method='POST'>";
            echo "<input type='text' name='amigo' value='".$row[0]."' >";
            echo $row[1]; 
            echo "<input type='submit'>"; 
            echo "</form>";
              
              echo "<br>";
              
              
              
          } 
      }
      mysqli_close($conn);		                                 
?>


</html>