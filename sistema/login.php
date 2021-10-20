<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <link rel="shortcut icon" href="cadastro_tcc/favicon.png" />

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Sistema de Login</title>
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
    	<div style="margin-top:40px;">
    	<div class="left">
		<form action="logar.php" method="post" enctype="multipart/form-data" name="formlogin">
        	<center>
            <span class="style1">Entrar No Jogo</span></center></br> 
            <div class="form_square_yellow">
			<span class="label_login"></span>
            <input name="login" type="text" id="login" maxlength="200" />
       		<div class="clearbr"></div>
            <div class="clearbr"></div>
			<span class="label_senha"></span>
            <input name="senha" type="password" id="label" maxlength="15" />
           	<div class="clearbr"></div>
            <div class="clearbr"></div>
      		<input type="submit" name="logar" value="Logar" id="logar" class="bt-white"/> 
			
            </div>
    	</form>
        </div>
        <div class="right" style="margin-top:100px;">
        	<a href="cadastro.php" class="bt-yellow">Faça seu Cadastro</a>
        </div>
        <div class="right" style="margin-top:100px;">
        	<img src="../imagens/ico/ou.jpg" />&nbsp;&nbsp;&nbsp;
        </div>
        <div class="clear"></div>
        </form>
    </center>
</body>
</html>

