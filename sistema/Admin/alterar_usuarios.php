<?php
include "../Config/config_sistema.php";
include "../validar_session_admin.php";

$sql = "select * from cadastro where idcadastro = '".$id."'";
$query = mysql_query($sql) or die (mysql_error());
$linha = mysql_fetch_array($query);

if($acao == 'alterar')
{	
	$login = isset($_REQUEST['login'])?$_REQUEST['login']:"";
	$senha = isset($_REQUEST['senha'])?$_REQUEST['senha']:"";
	$nome = isset($_REQUEST['nome'])?$_REQUEST['nome']:"";
	$email = isset($_REQUEST['email'])?$_REQUEST['email']:"";
	// deleta o usuario
	$sqlAlt = "update cadastro set login='$login', senha='$senha', nome='$nome', email='$email' where idcadastro = '".$id."'";
	$Alt = mysql_query($sqlAlt);
	header ("location: listar_usuarios.php");
}
?>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Petcool - Admin</title>
     <link rel="shortcut icon" href="favicon.png" />
    <style type="text/css">
    body{
    background:none;
    background-color:#FFFFFF;
    }
    </style>
    <link href="../../css/style.css" rel="stylesheet" type="text/css" />
</head>
	
<body>
	<div id="content">
  		<div id="wrapper">
        	<div class="clearbr"></div>
			<div class="left">
            	<span class="style1">Olá <b>ADMINISTRADOR</b></span>
            </div>
            <div class="right">
            	<div class="clearbr"></div>
            	<a href="../logout.php" class="bt-blue-light" style="margin-right:10px;">Logout</a>
            </div>
            <div class="right">
            	<div class="clearbr"></div>
            	<a href="cadastro.php" class="bt-yellow" style="margin-right:10px;">Cadastrar Usuário</a>
            </div>
            <div class="clear"></div>
            <div class="clearbr"></div>
            <form method="post" enctype="multipart/form-data" name="formcadastro">
            <div class="form_square_white">
                <div class="title">
                    Alteração de usuarios<br /><small>Aten&ccedil;&atilde;o: Os campos que contiverem <span class="red">(*)</span> são obrigatórios!</small>
                </div>
                <div class="clearbr"></div>
                <div class="clearbr"></div>
                <div class="left">  
                    <!---Nome---> 
                    <label for="label3">Nome:</label><span class="red">(*)</span><br />
                    <input name="nome" type="text" id="label3" size="30" maxlength="200" value="<?=$linha['nome']?>" />
                </div>
                <div class="left"> 
                <!---E-mail---->
                <label for="label4">E-mail:</label><span class="red">(*)</span><br />
                <input name="email" type="text" id="label4" size="40" maxlength="200" value="<?=$linha['email']?>" />
                </div>
                <div class="clear"></div>
                <div class="left"> 
                
                <!---Login---->
                <label for="textfield">Login:</label><span class="red">(*)</span><br />
                <input name="login" type="text" id="login" size="30" maxlength="50" value="<?=$linha['login']?>" />
                </div>
                <div class="left"> 
            
                <!---SENHA--->
                <label for="label">Senha:</label><span class="red">(*)</span><br />
                <input name="senha" type="text" id="label" size="20" maxlength="15" value="<?=$linha['senha']?>" />
                </div>
                <div class="clear"></div>
                <div class="clearbr"></div>
			</div>
            <div class="clearbr"></div>
            <div class="right">
                <input type="button" class="bt-gray-light" value="Voltar para listagem de usuários" onClick="window.location='listar_usuarios.php'"/>
          	</div>
            <div class="right">
                <input type="submit" name="alterar" value="Alterar" id="alterar" class="bt-blue-light"/>
                <input type="hidden" name="acao" id="acao" value="alterar" />
            </div>
            <div class="clear"></div>
       	</form>
        </div>
            <div class="clearbr"></div>
      	</div>
  	</div>
</body>
</html>
	