<?php
include "../Config/config_sistema.php";
include "../validar_session.php";
include "../../classe/classe.php";

//DATA ATUAL
$data_atual = date('Y-m-d');
//HORA DE VIDA
$hora_atual = date('H:i:s');

//DIAS DE VIDA
$dias_de_vida = funcoes::qtdeDias($dUser['bicho_data'],$data_atual);

//HORAS DE VIDA
$horas_de_vida = funcoes::qtdeHoras($dUser['bicho_data'],$dUser['bicho_hora'],$data_atual,$hora_atual);

$idcadastro = $dUser['idcadastro'];

//CONDIÇÕES DE COMER
$sAtCo = "select * from atividade WHERE  idtipo_acao = 1 and idcadastro = '".$idcadastro."'  ORDER BY idatividade DESC LIMIT 0,1";
$qAtCo = mysql_query($sAtCo);
$lAtCo = mysql_num_rows($qAtCo);
$dAtCo = mysql_fetch_array($qAtCo);
if($lAtCo<>0)
{
	$Ho_Co = funcoes::qtdeHoras($dAtCo['data_acao'],$dAtCo['hora_acao'],$data_atual,$hora_atual);
	if($Ho_Co >= '00:02')
	{
		$Ho_Co_Soma = funcoes::somaHora($dAtCo['hora_acao'],2);
		$Ho_Co_Prox = funcoes::horaDif($Ho_Co_Soma,$hora_atual);
		$Bt_Co = "on";
		$Msg_Co = "Sem comer <br>há <b>".$Ho_Co_Prox." minuto(s)</b>";
	}
	else
	{
		$Ho_Co_Prox = funcoes::horaDif($Ho_Co,'00:02');
		$Bt_Co = "off";
		$Msg_Co = "Próxima comidinha <br>em <b>".$Ho_Co_Prox." minuto(s)</b>";
	}
}
else
{
	$Ho_Co = funcoes::qtdeHoras($dUser['bicho_data'],$dUser['bicho_hora'],$data_atual,$hora_atual);
	if($Ho_Co >= '00:02')
	{
		$Ho_Co_Soma = funcoes::somaHora($dUser['bicho_hora'],2);
		$Ho_Co_Prox = funcoes::horaDif($Ho_Co_Soma,$hora_atual);
		$Bt_Co = "on";
		$Msg_Co = "Sem comer <br>há <b>".$Ho_Co_Prox." minuto(s)</b>";
	}
	else
	{
		$Ho_Co_Prox = funcoes::horaDif($Ho_Co,'00:02');
		$Bt_Co = "off";
		$Msg_Co = "Próxima comidinha <br>em <b>".$Ho_Co_Prox." minuto(s)</b>";
	}
}

//CONDIÇÕES DE BRINCAR
$sAtBr = "select * from atividade where idtipo_acao = 3 and idcadastro = '".$idcadastro."' ORDER BY idatividade DESC LIMIT 0,1";
$qAtBr = mysql_query($sAtBr);
$lAtBr = mysql_num_rows($qAtBr);
$dAtBr = mysql_fetch_array($qAtBr);
if($lAtBr<>0)
{
	$Ho_Br = funcoes::qtdeHoras($dAtBr['data_acao'],$dAtBr['hora_acao'],$data_atual,$hora_atual);
	if($Ho_Br >= '00:04')
	{
		$Ho_Br_Soma = funcoes::somaHora($dAtBr['hora_acao'],4);
		$Ho_Br_Prox = funcoes::horaDif($Ho_Br_Soma,$hora_atual);
		$Bt_Br = "on";
		$Msg_Br = "Sem Brincar <br>há <b>".$Ho_Br_Prox." minuto(s)</b>";
	}
	else
	{
		$Ho_Br_Prox = funcoes::horaDif($Ho_Br,'00:04');
		$Bt_Br = "off";
		$Msg_Br = "Próxima Brincadeira <br>em <b>".$Ho_Br_Prox." minuto(s)</b>";
	}
}
else
{
	$Ho_Br = funcoes::qtdeHoras($dUser['bicho_data'],$dUser['bicho_hora'],$data_atual,$hora_atual);
	if($Ho_Br >= '00:04')
	{
		$Ho_Br_Soma = funcoes::somaHora($dUser['bicho_hora'],4);
		$Ho_Br_Prox = funcoes::horaDif($Ho_Br_Soma,$hora_atual);
		$Bt_Br = "on";
		$Msg_Br = "Sem Brincar <br>há <b>".$Ho_Br_Prox." minuto(s)</b>";
	}
	else
	{
		$Ho_Br_Prox = funcoes::horaDif($Ho_Br,'00:04');
		$Bt_Br = "off";
		$Msg_Br = "Próxima Brincadeira <br>em <b>".$Ho_Br_Prox." minuto(s)</b>";
	}
}

//CONDIÇÕES DE BANHO
$sAtBa = "select * from atividade where idtipo_acao = 2 and idcadastro = '".$idcadastro."' ORDER BY idatividade DESC LIMIT 0,1";
$qAtBa = mysql_query($sAtBa);
$lAtBa = mysql_num_rows($qAtBa);
$dAtBa = mysql_fetch_array($qAtBa);
if($lAtBa<>0)
{
	$Ho_Ba = funcoes::qtdeHoras($dAtBa['data_acao'],$dAtBa['hora_acao'],$data_atual,$hora_atual);
	if($Ho_Ba >= '00:06')
	{
		$Ho_Ba_Soma = funcoes::somaHora($dAtBa['hora_acao'],6);
		$Ho_Ba_Prox = funcoes::horaDif($Ho_Ba_Soma,$hora_atual);
		$Bt_Ba = "on";
		$Msg_Ba = "Sem banho <br>há <b>".$Ho_Ba_Prox." minuto(s)</b>";
	}
	else
	{
		$Ho_Ba_Prox = funcoes::horaDif($Ho_Ba,'00:06');
		$Bt_Ba = "off";
		$Msg_Ba = "Próximo Banho <br>em <b>".$Ho_Ba_Prox." minuto(s)</b>";
	}
}
else
{
	$Ho_Ba = funcoes::qtdeHoras($dUser['bicho_data'],$dUser['bicho_hora'],$data_atual,$hora_atual);
	if($Ho_Ba >= '00:06')
	{
		$Ho_Ba_Soma = funcoes::somaHora($dUser['bicho_hora'],6);
		$Ho_Ba_Prox = funcoes::horaDif($Ho_Ba_Soma,$hora_atual);
		$Bt_Ba = "on";
		$Msg_Ba = "Sem Banho há <br><b>".$Ho_Ba_Prox." minuto(s)</b>";
	}
	else
	{
		$Ho_Ba_Prox = funcoes::horaDif($Ho_Ba,'00:06');
		$Bt_Ba = "off";
		$Msg_Ba = "Próximo Banho <br>em <b>".$Ho_Ba_Prox." minuto(s)</b>";
	}
}

//Condições Remédios para alimentação
if($Ho_Co >= '00:12')
{
	$Bt_Co = "off";
	$Bt_Br = "off";
	$Bt_Ba = "off";
	
	$Bt_Re = "on";
	
	$Msg_Co = "<b>Seu Bichinho Está Doente!</b>";
	$Msg_Br = "<b>Seu Bichinho Está Doente!</b>";
	$Msg_Ba = "<b>Seu Bichinho Está Doente!</b>";
}
//Condições Remédios para brincar
if($Ho_Br >= '00:14')
{
	$Bt_Co = "off";
	$Bt_Br = "off";
	$Bt_Ba = "off";
	
	$Bt_Re = "on";
	
	$Msg_Co = "<b>Seu Bichinho Está Doente!</b>";
	$Msg_Br = "<b>Seu Bichinho Está Doente!</b>";
	$Msg_Ba = "<b>Seu Bichinho Está Doente!</b>";
}

//Condições Remédios para brincar
if($Ho_Ba >= '00:16')
{
	$Bt_Co = "off";
	$Bt_Br = "off";
	$Bt_Ba = "off";
	
	$Bt_Re = "on";
	
	$Msg_Co = "<b>Seu Bichinho Está Doente!</b>";
	$Msg_Br = "<b>Seu Bichinho Está Doente!</b>";
	$Msg_Ba = "<b>Seu Bichinho Está Doente!</b>";
}



//Condições MORTE para alimentação
if($Ho_Co >= '00:27' or $Ho_Br >= '00:29' or $Ho_Ba >= '00:31')
{
	$Bt_Co = "off";
	$Bt_Br = "off";
	$Bt_Ba = "off";
	$Bt_Re = "off";
	$Bt_Novo = "on";
	$Msg_Co = "<b></b>";
	$Msg_Br = "<b></b>";
	$Msg_Ba = "<b></b>";
}

//AÇÕES
if($act == "comer"){
	unset($_SESSION['AnimaComer']);
	unset($_SESSION['AnimaBrincar']);
	unset($_SESSION['AnimaBanho']);
	unset($_SESSION['AnimaRemedio']);
	
	$data_acao = date('Y-m-d');
	$hora_acao = date('H:i:s');
	$idtipo_acao = 1;
	$idcadastro = $dUser['idcadastro'];
	
	$Ssql = "insert into atividade (idtipo_acao,data_acao,hora_acao,idcadastro) 
	values ('$idtipo_acao','$data_acao','$hora_acao','$idcadastro')";
	$Sconsulta = mysql_query($Ssql);
	$_SESSION['AnimaComer'] = "on";
	header ("location: jogo.php");	
}

if($act == "brincar"){
	unset($_SESSION['AnimaComer']);
	unset($_SESSION['AnimaBrincar']);
	unset($_SESSION['AnimaBanho']);
	unset($_SESSION['AnimaRemedio']);
	
	$data_acao = date('Y-m-d');
	$hora_acao = date('H:i:s');
	$idtipo_acao = 3;
	$idcadastro = $dUser['idcadastro'];
	
	$Ssql = "insert into atividade (idtipo_acao,data_acao,hora_acao,idcadastro) 
	values ('$idtipo_acao','$data_acao','$hora_acao','$idcadastro')";
	$Sconsulta = mysql_query($Ssql);
	$_SESSION['AnimaBrincar'] = "on";
	header ("location: jogo.php");	
}

if($act == "banho"){
	unset($_SESSION['AnimaComer']);
	unset($_SESSION['AnimaBrincar']);
	unset($_SESSION['AnimaBanho']);
	unset($_SESSION['AnimaRemedio']);
	
	$data_acao = date('Y-m-d');
	$hora_acao = date('H:i:s');
	$idtipo_acao = 2;
	$idcadastro = $dUser['idcadastro'];
	
	$Ssql = "insert into atividade (idtipo_acao,data_acao,hora_acao,idcadastro) 
	values ('$idtipo_acao','$data_acao','$hora_acao','$idcadastro')";
	$Sconsulta = mysql_query($Ssql);
	$_SESSION['AnimaBanho'] = "on";
	header ("location: jogo.php");	
}

if($act == "remedio"){
	unset($_SESSION['AnimaComer']);
	unset($_SESSION['AnimaBrincar']);
	unset($_SESSION['AnimaBanho']);
	unset($_SESSION['AnimaRemedio']);
	
	$data_acao = date('Y-m-d');
	$hora_acao = date('H:i:s');
	$idtipo_acao = 4;
	$idcadastro = $dUser['idcadastro'];
	$idtipo_acao1 = 1;
	$idtipo_acao2 = 2;
	$idtipo_acao3 = 3;
	
	$Ssql = "insert into atividade (idtipo_acao,data_acao,hora_acao,idcadastro) 
	values ('$idtipo_acao','$data_acao','$hora_acao','$idcadastro')";
	$Sconsulta = mysql_query($Ssql);
	
	$Ssql1 = "insert into atividade (idtipo_acao,data_acao,hora_acao,idcadastro) 
	values ('$idtipo_acao1','$data_acao','$hora_acao','$idcadastro')";
	$Sconsulta1 = mysql_query($Ssql1);
	
	$Ssql2 = "insert into atividade (idtipo_acao,data_acao,hora_acao,idcadastro) 
	values ('$idtipo_acao2','$data_acao','$hora_acao','$idcadastro')";
	$Sconsulta2 = mysql_query($Ssql2);
	
	$Ssql3 = "insert into atividade (idtipo_acao,data_acao,hora_acao,idcadastro) 
	values ('$idtipo_acao3','$data_acao','$hora_acao','$idcadastro')";
	$Sconsulta3 = mysql_query($Ssql3);
	
	$_SESSION['AnimaRemedio'] = "on";
	header ("location: jogo.php");	
}

if($act == "novo"){
	unset($_SESSION['AnimaComer']);
	unset($_SESSION['AnimaBrincar']);
	unset($_SESSION['AnimaBanho']);
	unset($_SESSION['AnimaRemedio']);
	
	$bicho_data = date('Y-m-d');
	$bicho_hora = date('H:i:s');
	$idcadastro = $dUser['idcadastro'];
	
	$sqlAlt = "update cadastro set bicho_data='$bicho_data',bicho_hora='$bicho_hora' where idcadastro = '".$idcadastro."'";
	$Alt = mysql_query($sqlAlt);

	$sqlDelHist = "delete from atividade where idcadastro = '".$idcadastro."'";
	$Del = mysql_query($sqlDelHist);
	
	header ("location: jogo.php");	
}

//PARAR ANIMAÇÕES
if($act == "parar"){
	unset($_SESSION['AnimaComer']);
	unset($_SESSION['AnimaBrincar']);
	unset($_SESSION['AnimaBanho']);
	unset($_SESSION['AnimaRemedio']);
	header ("location: jogo.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta HTTP-EQUIV="refresh" CONTENT="60">
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>PETCOOL</title>
	
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
            	<span class="style1">Olá <b><?=$dUser['login']?></b>, vamos jogar?</span>
            </div>
            <div class="left">
                <div class="form_square_yellow" style="margin-top:10px; margin-left:5px;">
                    <b><?=$dias_de_vida?> Dias ou <?=$horas_de_vida;?> Horas de vida
                </div>
          	</div>
            <div class="right">
            	<div class="clearbr"></div>
            	<a href="../logout.php" class="bt-blue-light" style="margin-right:10px;">Logout</a>
            </div>
            <div class="clear"></div>
            <div class="clearbr"></div>
            <div class="form_square_white">
                <div class="form_square_blue">
                    <div class="left">
                    	<div class="form_square_blue">
                            <small>
                            <b>Tabela de<br />Horários</b>
                            </small>
                        </div>
                    </div>
                    <div class="left">
                    	<div class="form_square_yellow">
                            <small><center>
                            Dar comidinha a cada <b>2 minutos</b><br/>
                            Doente: Sem comer por <b>10 minutos</b> </center>
                            </small>
                        </div>
                    </div>
                    <div class="left">
                    	<div class="form_square_yellow">
                            <small><center>
                            Brincar a cada <b>4 minutos</b><br />
                            Doente: Sem brincar por <b>10 minutos</b></center>
                            </small>
                        </div>
                    </div>
                    <div class="left">
                    	<div class="form_square_yellow">
                            <small><center>
                            Dar banho a cada <b>6 minutos</b><br />
                            Doente: Sem banho por <b>10 minutos</b></center>
                            </small>
                        </div>
                    </div>
                    <div class="left">
                    	<div class="form_square_yellow">
                            <small>
                            <b><center>MORTE DO BICHINHO</b><br /> 
                            <b>15 minutos</b> doente</center>
                            </small>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="clearbr"></div>
              	<div class="left">
                	<small><?=$Msg_Co?></small><br />
                		<?
						if($Bt_Co=="on")
						{
						?>
                        <a href="?act=comer">
							<img src="../../imagens/bt/bt-co-ativo.png" />
						</a>
                        <?
						}
						else
						if($Bt_Co=="off")
						{
						?>
                        	<img src="../../imagens/bt/bt-co-inativo.png" />
                        <?
						}
						?>
                </div>
                <div class="left">
                	<small><?=$Msg_Br?></small><br />
                		<?
						if($Bt_Br=="on")
						{
						?>
                        <a href="?act=brincar">
                       		<img src="../../imagens/bt/bt-br-ativo.png" />
                        </a>
                        <?
						}
						elseif($Bt_Br=="off")
						{
						?>
                        	<img src="../../imagens/bt/bt-br-inativo.png" />
                        <?
						}
						?>
                </div>
                <div class="left">
                	<small><?=$Msg_Ba?></small><br />
                		<?
						if($Bt_Ba=="on")
						{
						?>
                        <a href="?act=banho">
                       		<img src="../../imagens/bt/bt-ba-ativo.png" />
                        </a>
                        <?
						}
						elseif($Bt_Ba=="off")
						{
						?>
                        	<img src="../../imagens/bt/bt-ba-inativo.png" />
                        <?
						}
						?>
                </div>
                <?
				if($Bt_Re == "on")
				{
				?>
                <div class="left">
                	<small><b>Tomar seu Remédio</b></small><br />
                    <a href="?act=remedio"><img src="../../imagens/bt/bt-re-ativo.png" /></a>
                </div>
                <?
				}
				if($Bt_Novo == "on")
				{
				?>
                <div class="left">
                	<small>&nbsp;</small><br />
                    <a href="?act=novo"><img src="../../imagens/bt/bt-novo-ativo.png" /></a>
                </div>
                <?
				}
				?>
                <div class="clear"></div>
            </div>
            <div class="clearbr"></div>
			<center>
			<?
			//ANIMAÇÕES DE AÇÕES DO BICHINHO
            if($_SESSION['AnimaComer']=="on")
            {
          	?>
            	<div class="clearbr"></div>
            	<span class="style2">Eba, seu bichinho já <b>comeu</b>! Clique no Botão <a href="?act=parar" class="bt-red">Voltar</a></span>
                <div class="clearbr"></div>
				
                <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','460','height','334','src','../../swf/acoes/fome','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','movie','../../swf/acoes/fome' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553533400" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="460" height="334">
                  <param name="movie" value="../../swf/acoes/fome.swf" />
                  <param name="quality" value="high" />
                  <embed src="../../swf/acoes/fome.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="460" height="334"></embed>
                </object>
              </noscript>
			<?
            }
			else
			if($_SESSION['AnimaBrincar']=="on")
            {
          	?>
            	<div class="clearbr"></div>
            	<span class="style2">Seu bichinho já <b>brincou</b>! Clique no Botão <a href="?act=parar" class="bt-red">Voltar</a></span>
                <div class="clearbr"></div>
				
                <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','460','height','334','src','../../swf/acoes/brincar','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','movie','../../swf/acoes/brincar' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553533400" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="460" height="334">
                  <param name="movie" value="../../swf/acoes/brincar.swf" />
                  <param name="quality" value="high" />
                  <embed src="../../swf/acoes/brincar.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="460" height="334"></embed>
                </object>
              </noscript>
			<?
            }
			else
			if($_SESSION['AnimaBanho']=="on")
            {
          	?>
            	<div class="clearbr"></div>
            	<span class="style2">Eba, seu bichinho já está <b>Limpinho</b>! Clique no Botão <a href="?act=parar" class="bt-red">Voltar</a></span>
                <div class="clearbr"></div>
				
                <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','460','height','334','src','../../swf/acoes/banho','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','movie','../../swf/acoes/banho' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553533400" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="460" height="334">
                  <param name="movie" value="../../swf/acoes/banho.swf" />
                  <param name="quality" value="high" />
                  <embed src="../../swf/acoes/banho.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="460" height="334"></embed>
                </object>
              </noscript>
			<?
            }
			else
			if($_SESSION['AnimaRemedio']=="on")
            {
          	?>
            	<div class="clearbr"></div>
            	<span class="style2">Eba, seu bichinho já está<b>saúdavel</b>! Clique no Botão <a href="?act=parar" class="bt-red">Voltar</a></span>
                <div class="clearbr"></div>
				
                <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','460','height','334','src','../../swf/acoes/remedio','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','movie','../../swf/acoes/remedio' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553533400" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="460" height="334">
                  <param name="movie" value="../../swf/acoes/remedio.swf" />
                  <param name="quality" value="high" />
                  <embed src="../../swf/acoes/remedio.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="460" height="334"></embed>
                </object>
              </noscript>
			<?
            }
			else
			if($Bt_Co == "on" and $Bt_Br == "on" and $Bt_Ba == "on")
			{
			?>
           	  <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','460','height','334','src','../../swf/status/co_br_ba','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','movie','../../swf/status/co_br_ba' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553533334" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="460" height="334">
                  <param name="movie" value="../../swf/status/co_br_ba.swf" />
                  <param name="quality" value="high" />
                  <embed src="../../swf/status/co_br_ba.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="460" height="334"></embed>
          	  </object></noscript>
            <?
			}
			else
			if($Bt_Co == "on" and $Bt_Br == "on")
			{
			?>
           	  <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','460','height','334','src','../../swf/status/co_br','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','movie','../../swf/status/co_br' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553533334" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="460" height="334">
                  <param name="movie" value="../../swf/status/co_br.swf" />
                  <param name="quality" value="high" />
                  <embed src="../../swf/status/co_br.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="460" height="334"></embed>
          	  </object></noscript>
            <?
			}
			else
			if($Bt_Co == "on" and $Bt_Ba == "on")
			{
			?>
           	  <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','460','height','334','src','../../swf/status/co_ba','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','movie','../../swf/status/co_ba' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553533334" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="460" height="334">
                  <param name="movie" value="../../swf/status/co_ba.swf" />
                  <param name="quality" value="high" />
                  <embed src="../../swf/status/co_ba.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="460" height="334"></embed>
          	  </object></noscript>
            <?
			}
			else
			if($Bt_Co == "on")
			{
			?>
           	  <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','460','height','334','src','../../swf/status/co','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','movie','../../swf/status/co' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553533334" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="460" height="334">
                  <param name="movie" value="../../swf/status/co.swf" />
                  <param name="quality" value="high" />
                  <embed src="../../swf/status/co.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="460" height="334"></embed>
          	  </object></noscript>
          	<?
			}
			else
			if($Bt_Br == "on" and $Bt_Ba == "on")
			{
			?>
           	  <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','460','height','334','src','../../swf/status/br_ba','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','movie','../../swf/status/br_ba' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553533334" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="460" height="334">
                  <param name="movie" value="../../swf/status/br_ba.swf" />
                  <param name="quality" value="high" />
                  <embed src="../../swf/status/br_ba.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="460" height="334"></embed>
          	  </object></noscript>
            <?
			}
			else
			if($Bt_Br == "on")
			{
			?>
           	  <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','460','height','334','src','../../swf/status/br','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','movie','../../swf/status/br' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553533334" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="460" height="334">
                  <param name="movie" value="../../swf/status/br.swf" />
                  <param name="quality" value="high" />
                  <embed src="../../swf/status/br.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="460" height="334"></embed>
          	  </object></noscript>
            <?
			}
			else
			if($Bt_Ba == "on")
			{
			?>
			  <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','460','height','334','src','../../swf/status/ba','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','movie','../../swf/status/ba' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553533334" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="460" height="334">
                  <param name="movie" value="../../swf/status/ba.swf" />
                  <param name="quality" value="high" />
                  <embed src="../../swf/status/ba.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="460" height="334"></embed>
			  </object></noscript>
			<?
			}
			else
			if($Bt_Re == "on")
			{
			?>
           	  <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','460','height','334','src','../../swf/status/remedio','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','movie','../../swf/status/remedio' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553533334" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="460" height="334">
                  <param name="movie" value="../../swf/status/remedio.swf" />
                  <param name="quality" value="high" />
                  <embed src="../../swf/status/remedio.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="460" height="334"></embed>
          	  </object></noscript>
            <?
			}
			else
			if($Bt_Novo == "on")
			{
			?>
           	  <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','460','height','334','src','../../swf/status/morre','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','movie','../../swf/status/morre' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553533334" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="460" height="334">
                  <param name="movie" value="../../swf/status/morre.swf" />
                  <param name="quality" value="high" />
                  <embed src="../../swf/status/morre.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="460" height="334"></embed>
          	  </object></noscript>
			<?
			}
			else
			{
			?>
           	  <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','460','height','334','src','../../swf/status/ok','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','movie','../../swf/status/ok' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553533400" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="460" height="334">
                  <param name="movie" value="../../swf/status/ok.swf" />
                  <param name="quality" value="high" />
                  <embed src="../../swf/status/ok.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="460" height="334"></embed>
          	  </object></noscript>
            <?
			}
            ?>
       	  </center>
      	</div>
  	</div>
</body>
</html>
