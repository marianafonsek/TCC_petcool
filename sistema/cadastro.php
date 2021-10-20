<?php
	// inclui o arquivo de configuração do sistema
	include "Config/config_sistema.php";

 	$act = isset($_REQUEST['act'])?$_REQUEST['act']:"";
 
 	if($act == "cadastrar")
 	{
		// recebe dados do formulario
		$login = htmlspecialchars($_POST['login']); 
		$senha = $_POST['senha'];
		$rep_senha = $_POST['rep_senha'];
		$nome = htmlspecialchars($_POST['nome']);
		$email = htmlspecialchars($_POST['email']);
	
		// verifica se o usuario digitou o login
		if($login == "") 
		{
			echo "Digite seu login!";
			exit;
		} 
		else 
		{
			// se o usuario digitou o login ele verifica
			// se esta disponivel
			$consulta = mysql_query("select * from cadastro where login = '$login'");
			$linha = mysql_num_rows($consulta);
			if($linha != 0) 
			{
				echo "O nome de usuario que você<br>
					  Digitou já existe tente outro!";
				exit;
			}
		}
	 
		// verifica se o usuario digitou a senha
		if($senha == "") 
		{
			echo "Digite sua senha!";
			exit;
		} else 
		{
			// se o usuario digitou a senha
			// vamos comparar com a contra senha
			if($senha != $rep_senha) 
			{
				echo "Senha invalida!";
				exit;
			}
		}
	 
		// verifica se o usuario digitou o nome
		if($nome == "") 
		{
			echo "Digite seu nome!";
			exit;
		}
		 
		// verifica o email
		if($email == "") 
		{
			echo "Digite o seu e-mail!";
			exit;
		}
	 
	 	$data_acesso = date('Y-m-d');
		$hora_acesso = date('H:i:s');
		
		// faz consulta no banco para inserir os dados do usuario
		$sql = "insert into cadastro (idcadastro,login,senha,nome,email,bicho_data,bicho_hora) values ('','$login','$senha','$nome','$email','$data_acesso','$hora_acesso')";
		$consulta = mysql_query($sql);
		$idcadastro = mysql_insert_id();
		
		session_start();
		$_SESSION['IDCadastro'] = $idcadastro;
		
		$data_acesso = date('Y-m-d');
		$hora_acesso = date('H:i:s');
	
		$sqlInsertInfo = "insert into historico_acesso (data_acesso, hora_acesso, idcadastro) values ('$data_acesso', '$hora_acesso', '$idcadastro');";
		$InsertInfo = mysql_query($sqlInsertInfo);

		$sUser = mysql_query("select * from cadastro where idcadastro = '$idcadastro'");
		$dUser = mysql_fetch_array($sUser);
		$qtd_acesso = $dUser['qtd_acesso']+1;
		$SADD = "update cadastro set qtd_acesso='$qtd_acesso' where idcadastro = '$idcadastro'";
		$DADD = mysql_query($SADD);
	
		echo "<script language=\"javascript\">window.open(\"Usuario/jogo.php\",\"_parent\");</script>"; 
	}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="favicon.png" />

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>TCC - CREATIF</title>

<link href="../css/style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
body{
background:none;
background-color:#FFFFFF;
}
</style>
</head>

<body>
	<center>
	<form action="" method="post" enctype="multipart/form-data" name="formcadastro">
		<span class="style1">Meu Cadastro</span><br />
        <span class="style2">Aten&ccedil;&atilde;o:</span> Os campos que contiverem (<span class="style2">*</span>) s&atilde;o obrigatórios!</span>
        <div class="form_square_yellow">
            <br />
			<label for="textfield">Login</label>
      		<input name="login" type="text" id="login" size="35" maxlength="50" />
      		<span class="style9">*</span>
			</br>
			<!---SENHA--->
			<label for="label">Senha</label>
      		<input name="senha" type="password" id="label" size="35" maxlength="15" />
      		<span class="style5"><small>(No m&aacute;ximo 15 caracteres)</small></span><span class="style9"> *</span>
			</br>
   			<!---REP. SENHA---->
			<label for="label2">Confirma Senha</label>
      		<input name="rep_senha" type="password" id="label2" size="35" maxlength="15" />
      		<span class="style9">*</span>
		   	</br>
      		<!---Nome---> 
			<label for="label3">Nome</label>
      		<input name="nome" type="text" id="label3" size="35" maxlength="200" />
      		<span class="style9">*</span>
			</br>
	  		<!---E-mail---->
			<label for="label4">E-mail</label>
      		<input name="email" type="text" id="label4" size="35" maxlength="200" />
      		<span class="style9">*</span>
			</br>
            <input type="submit" name="cad" value="Cadastrar" id="cad" class="bt-white" />
	     	<input type="reset" name="limpar" value="Limpar dados" id="label13" class="bt-white" />
         	<input type="hidden" name="act" id="act" value="cadastrar" />
		</div>
        <div class="right">
        	<a href="login.php" class="bt-yellow">Já sou cadastrado</a>
        </div>
  	</form>
	</center>
</body>
</html>
	