<?php
    function con(){
			// iniciar uma sessão
			$hostname = "127.0.0.1";
			$user = "root";
			$password = "root";
			$database = "rede";

            return (new mysqli($hostname,$user,$password,$database));
    }

?>