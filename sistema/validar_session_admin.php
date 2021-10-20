<?php
session_start();

$ValAdmin = $_SESSION['ValAdmin'];

$acao = isset($_REQUEST['acao'])?$_REQUEST['acao']:"";

$act = isset($_REQUEST['act'])?$_REQUEST['act']:"";

foreach($_REQUEST as $ind => $val)
{
	$$ind=$val;
}

// verifica se a variavel existir
if($ValAdmin<>"ok")
{
	header("Location: ../../index.html");
}
?>