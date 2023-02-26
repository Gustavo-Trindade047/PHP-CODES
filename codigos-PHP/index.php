<html>
    <head>
        <title>OtaKompany</title>
		<link rel="icon" type="image/x-icon" href="/blaaa/fav.ico">
		<link href="CSS/index.css" type="text/css" rel="stylesheet" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body> 

<center>
<img src="fundo.png" class="fundoC" />
	<div class="botao"> 
	<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>
  <div id="id01" class="modal">
    
    <form class="modal-content animate" action="verificaLogin.php" method="post">
    <div class="imgcontainer">
    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      
  </div>

     <div class="container">
     <img src="intro1.gif"><br>
      <label for="uname"><b>E.mail</b></label>
      <input type="text" placeholder="Insira o Email" name="email" required>

      <label for="psw"><b>Senha</b></label>
      <input type="password" placeholder="Insira a Senha" name="senha" required>
        
      <button type="submit">Entrar</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Lembrar
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancelar</button>
      <span class="psw">Esqueceu a <a href="recuperarSenha.php">senha?</a></span>
    </div>
  </form>
</div>
<div class="botao2">
  <a href="cadastrar.php" class="butao"> Registrar </a>

</div> 
	</center>

    </body>
</html>
