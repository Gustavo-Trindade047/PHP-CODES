

<?php
/* Array with names
$a[] = "Afeganistão";
$a[] = "África do Sul";
$a[] = "Albânia";
$a[] = "Alemanha";
$a[] = "Andorra";
$a[] = "Angola";
$a[] = "Antiga e Barbuda";
$a[] = "Arábia Saudita";
$a[] = "Argélia";
$a[] = "Argentina";
$a[] = "Arménia";
$a[] = "Austrália";
$a[] = "Áustria";
$a[] = "Azerbaijão";
$a[] = "Bahamas";
$a[] = "Bangladexe";
$a[] = "Barbados";
$a[] = "Barém";
$a[] = "Bélgica";
$a[] = "Belize";
$a[] = "Benim";
$a[] = "Bielorrússia";
$a[] = "Bolívia";
$a[] = "Bósnia e Herzegovina";
$a[] = "Botsuana";
$a[] = "Brasil";
$a[] = "Brunei";
$a[] = "Bulgária";
$a[] = "Burquina Faso";
$a[] = "Burúndi";
$a[] = "Butão";
$a[] = "Cabo Verde";
$a[] = "Camarões";
$a[] = "Camboja";
$a[] = "Canadá";
$a[] = "Catar";
$a[] = "Cazaquistão";
$a[] = "Chade";
$a[] = "Chile";
$a[] = "China";
$a[] = "Chipre";
$a[] = "Colômbia";
$a[] = "Congo-Brazzaville";
$a[] = "Coreia do Norte";
$a[] = "Coreia do Sul";
$a[] = "Cosovo";
$a[] = "Costa do Marfim";
$a[] = "Costa Rica";
$a[] = "Croácia";
$a[] = "Cuaite";
$a[] = "Cuba";
$a[] = "Dinamarca";
$a[] = "Dominica";
$a[] = "Egito";
$a[] = "Emirados Árabes Unidos";
$a[] = "Equador";
$a[] = "Eritreia";
$a[] = "Eslováquia";
$a[] = "Eslovénia";
$a[] = "Espanha";
$a[] = "Essuatíni";
$a[] = "Estado da Palestina";
$a[] = "Estados Unidos";
$a[] = "Estónia";
$a[] = "Etiópia";
$a[] = "Fiji";
$a[] = "Filipinas";
$a[] = "Finlândia";
$a[] = "França";
$a[] = "Gabão";
$a[] = "Gâmbia";
$a[] = "Gana";
$a[] = "Geórgia";
$a[] = "Granada";
$a[] = "Grécia";
$a[] = "Guatemala";
$a[] = "Guiana";
$a[] = "Guiné";
$a[] = "Guiné-Bissau";
$a[] = "Guiné Equatorial";
$a[] = "Haiti"; */
include_once "banco.php";

$conn = con();

if ($conn -> connect_errno) {
  echo "Failed to connect to MySQL: " . $conn -> connect_error;
  exit();
} else {
  // Evita caracteres especiais (SQL Inject)

$sql=    "SELECT `paisNome` 
          FROM `pais`;";

$resultado = $conn->query($sql);

while($row = mysqli_fetch_array($resultado)){
  $a[]=$row[0];
}
$conn->close();
}
// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "<select id='paises'>";

// lookup all hints from array if $q is different from ""
if ($q !== "") {
  $q = strtolower($q);
  $len=strlen($q);
  foreach($a as $name) {
    if (stristr($q, substr($name, 0, $len))) {
      if ($hint === "") {
        $hint = "<option value=$name>$name</option>";
      } else {
        //$hint .= "<br> $name";
        $hint .= "<option value=$name>$name</option>";
      }
    }
  }
  $hint .= "</select>";
}

// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "no suggestion" : $hint;

?>