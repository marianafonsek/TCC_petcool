<?php

// faz conexão com o servidor MySQL
$local_serve = "mysql2.000webhost.com"; 	 // local do servidor
$usuario_serve = "a1571151_user";		 // nome do usuario
$senha_serve = "creatif123";			 	 // senha
$banco_de_dados = "a1571151_user"; 	 // nome do banco de dados

$conn = mysql_connect($local_serve,$usuario_serve,$senha_serve) or die ("O servidor não responde! ".mysql_error());

// conecta-se ao banco de dados
$db = mysql_select_db($banco_de_dados,$conn) or die ("Não foi possivel conectar-se ao banco de dados! ".mysql_error());
?>