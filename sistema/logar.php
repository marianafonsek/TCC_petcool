<?php
// inclui o arquivo de configuração do sistema
include "Config/config_sistema.php";

// recebe dados do formulario
$login = htmlspecialchars($_POST['login']);
$senha = $_POST['senha'];

// verifica se o usuario existe
$consulta = mysql_query("select * from cadastro where login='$login' and senha='$senha'");
$campos = mysql_num_rows($consulta);
$dados = mysql_fetch_array($consulta);

if($login == "tcccreatif" and $senha == "tcc2012") 
{
	session_start();
	$_SESSION['ValAdmin'] = "ok";
	
	echo "<script language=\"javascript\">window.open(\"Admin/listar_usuarios.php\",\"_parent\");</script>";		
}	
elseif($campos != 0) 
{
	// se o login não for do administrado vamos criar a sessão dele, uma sessão bem basiquinha ;D
	session_start();
	$_SESSION['IDCadastro'] = $dados['idcadastro'];
	
	$idcadastro = $dados['idcadastro'];
	
	$data_acesso = date('Y-m-d');
	$hora_acesso = date('H:i:s');
	
	$sqlInsertInfo = "insert into historico_acesso (data_acesso, hora_acesso, idcadastro) values ('$data_acesso', '$hora_acesso', '$idcadastro');";
	$InsertInfo = mysql_query($sqlInsertInfo);

    $sUser = mysql_query("select * from cadastro where idcadastro = '$idcadastro'");
    $dUser = mysql_fetch_array($sUser);
	$qtd_acesso = $dUser['qtd_acesso']+1;
    $SADD = "update cadastro set qtd_acesso='$qtd_acesso' where idcadastro = '$idcadastro'";
    $DADD = mysql_query($SADD);

	//header("Location: Usuario/jogo.php");
	echo "<script language=\"javascript\">window.open(\"Usuario/jogo.php\",\"_parent\");</script>"; 
}
else 
{
	echo "O usuario não existe!";
	exit;
}
?>		