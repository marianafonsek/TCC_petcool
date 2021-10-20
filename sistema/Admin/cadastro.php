<?php
include "../Config/config_sistema.php";
include "../validar_session_admin.php";

if($acao == 'cadastrar')
{
	// recebe dados do formulario
	$login = htmlspecialchars($_POST['login']);
	$senha = $_POST['senha'];
	$rep_senha = $_POST['rep_senha'];
	$nome = htmlspecialchars($_POST['nome']);
	$email = htmlspecialchars($_POST['email']);       
	
	// verifica se o usuario digitou o login
	if($login == "") {
		echo "Digite seu login!";
		exit;
	} 
	
	else {
		// se o usuario digitou o login ele verifica se esta disponivel
		$consulta = mysql_query("select * from cadastro where Login = '$login'");
		$linha = mysql_num_rows($consulta);
		if($linha != 0) {
			echo "O nome de usuário que você<br>
				  digitou já existe, tente outro!";
			exit;
		}
	}
	
	// verifica se o usuario digitou a senha
	if($senha == "") {
		echo "Digite sua senha!";
		exit;
	} 
	
	else {
		// se o usuario digitou a senha vamos comparar com a contra senha
		if($senha != $rep_senha) {
			echo "Confirmação de Senha inválida!";
			exit;
		}
	}
	
	// verifica se o usuario digitou o nome
	if($nome == "") {
		echo "Digite seu nome!";
		exit;
	}
	
	// verifica o email
	//if($email == "") {
	//	echo "Digite seu e-mail!";
		
	
	// Validar Email
	if ($email == "") 
              {
		echo "Digite um e-mail valido";
	
	}	
	
	// faz consulta no banco para inserir os dados do usuario
	$sql = "insert into cadastro (login,senha,nome,email) 
	values ('$login','$senha','$nome','$email')";
	$consulta = mysql_query($sql);
	
	
	header ("location: listar_usuarios.php");
}
?>
<html>
<head>

<link rel="shortcut icon" href="../favicon.png" />
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
                    Cadastro de usuarios<br /><small>Aten&ccedil;&atilde;o: Os campos que contiverem <span class="red">(*)</span> são obrigatórios!</small>
                </div>
                <div class="clearbr"></div>
                <div class="left">
                    <!---Nome---> 
                    <label for="label3">Nome:</label><span class="red">(*)</span><br />
                    <input name="nome" type="text" id="label3" size="30" maxlength="200" /><br />
                    </div>
                    <div class="left">
                    
                    <!---E-mail---->
                    <label for="label4">E-mail:</label><span class="red">(*)</span><br />
                    <input name="email" type="text" id="label4" size="40" maxlength="200" /><br />
                    </div>
                    <div class="clear"></div>
                    <div class="left">
                    
                    <!---login--->
                    <label for="textfield">Login</label><span class="red">(*)</span><br />
                    <input name="login" type="text" id="login" size="30" maxlength="50" />
                    <br />
                    </div>
                    <div class="left">
                    
                    <!---SENHA--->
                    <label for="label">Senha:</label><span class="red">(*)</span><br />
                    <input name="senha" type="password" id="label" size="20" maxlength="15" /><br />
                    <small>No m&aacute;ximo 15 caracteres!</small>
                    </div>
                    <div class="left">
                    
                    <!---REP. SENHA---->
                    <label for="label2">Confirmar senha:</label><span class="red">(*)</span><br />
                    <input name="rep_senha" type="password" id="label2" size="20" maxlength="15" /><br />
                    </div>
                    <div class="clear"></div>                    
                    <div class="clearbr"></div>
         	</div>
            <div class="clearbr"></div>
            <div class="right">
         		<input type="button" class="bt-gray-light" value="Voltar para listagem de usuários" onClick="window.location='listar_usuarios.php'"/>
         	</div>
        	<div class="right">
        		<input type="submit" name="cadastrar" value="Cadastrar" id="cadastrar" class="bt-blue-light" />
        		<input type="hidden" name="acao" id="acao" value="cadastrar" />
          	</div>
         	<div class="clear"></div>
            </form>
      	</div>
  	</div>
</body>
</html>
						