<html>
    <head>
        <title> OtaKompany</title>
		<link rel="icon" type="image/x-icon" href="/blaaa/fav.ico">
		<link href="CSS/cadastrar.css" type="text/css" rel="stylesheet" />

	</head>
	
    <body>
	<script>
function showHint(str) {
  if (str.length == 0) {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "paises.php?q=" + str, true);
    xmlhttp.send();
  }
}
</script>

<div>
  <div class="cadastroBox">
	<form method="post" action="cadastrarBanco.php" id="formlogin" name="formlogin" >
		<label>Nome: </label>
		<input type="text" name="nomeUsuario" id="nomeUsuario" size=20 required><br />
			
    <label>E.mail: </label>
		<input type="email" name='email' id='email' size=20 required> <br>

   	<label>Senha: </label>
		<input type="password" name="senha" id="senha" size=20 required> <br>
		
		<label for="pais">País de origem:</label><br>
		<span id="txtHint"></span></p>
		<input type="text" id="pais" name="pais" onkeyup="showHint(this.value)"> <br>
		
				
					<input type="submit" value="CADASTRAR"  />
			
			</form>
</div>
	</body>
</html>
