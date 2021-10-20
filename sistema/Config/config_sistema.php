<?php

// faz conexão com o servidor MySQL
$local_serve = "mysql.productweb.com.br"; 	 // local do servidor
$usuario_serve = "productweb04";		 // nome do usuario
$senha_serve = "Pet123456";			 	 // senha
$banco_de_dados = "productweb04"; 	 // nome do banco de dados

$conn = mysql_connect($local_serve,$usuario_serve,$senha_serve) or die ("O servidor não responde! ".mysql_error());

// conecta-se ao banco de dados
$db = mysql_select_db($banco_de_dados,$conn) or die ("Não foi possivel conectar-se ao banco de dados! ".mysql_error());
?>