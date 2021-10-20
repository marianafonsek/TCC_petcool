<?php
session_start();

$IDCadastro = $_SESSION['IDCadastro'];

$acao = isset($_REQUEST['acao'])?$_REQUEST['acao']:"";

$act = isset($_REQUEST['act'])?$_REQUEST['act']:"";

foreach($_REQUEST as $ind => $val)
{
	$$ind=$val;
}

// verifica se a variavel existir
if(isset($IDCadastro))
{
	// se existie as sessões coloca os valores em uma varivel
	//$sUser = mysql_query("select * from cadastro where idcadastro = '$IDCadastro'");
	//$dUser = mysql_fetch_array($sUser);
	
	$sUser = "select * from cadastro where idcadastro = '$IDCadastro'";
	$qUser = mysql_query($sUser);
	$dUser = mysql_fetch_array($qUser);
} 
else 
{
	header("Location: ../../index.html");
}
?>