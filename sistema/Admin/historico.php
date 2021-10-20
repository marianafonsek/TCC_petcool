<?php
include "../Config/config_sistema.php";
include "../validar_session_admin.php";

if($act == 'alt')
{	
	foreach($hora_acao as $iAcao => $vAcao)
	{
		$sqlAlt = "update atividade set hora_acao='$vAcao' where idatividade = '".$iAcao."'";
		$Alt = mysql_query($sqlAlt);
	}
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
            	<span class="style1">Olá, <b>ADMINISTRADOR</b></span>
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
            <div class="form_square_white">
                <div class="clearbr"></div>
                <div class="left" style="width:45%">
                	<div class="title">
                        <center>Historico de Acessos</center>
                    </div>
                    <div class="clearbr"></div>
                    <table width="350" border="0" cellpadding="0" cellspacing="0">
                        <!--DWLayoutTable-->  
                        <thead>
                            <tr>
                                <th scope="col"><center>Data</center></th>
                                <th scope="col"><center>Hora</center></th>
                            </tr>
                        </thead>
                                        <?php
                            //$sql = "select cadastro.idcadastro, cadastro.login, cadastro.senha, cadastro.email, cadastro.bicho, cadastro.nome, atividade.data_acesso, atividade.hora_acesso from cadastro, atividade where cadastro.idcadastro = atividade.idcadastro";
                                        $sql = "select * from historico_acesso where idcadastro = '$id';";
                            $query = mysql_query($sql) or die (mysql_error());
                            while($linha = mysql_fetch_array($query)){
                            ?>
                        <tbody>
                 
                            
                                     
                            <tr>
                                <td><center><?=$linha['data_acesso']?></center></td>
                                <td><center><?=$linha['hora_acesso']?></center></td>
                           </tr>
                            <?
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="8" align="right">
                                <?
                                $num_usuarios = mysql_num_rows($query);
                                $total_usuarios = $num_usuarios;
                                echo "Total de Acessos: ".$total_usuarios;
                                ?>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
           		</div>
                <div class="right" style="width:50%;">
                	<div class="title">
                        <center>Historico de Ações</center>
                    </div>
                    <div class="clearbr"></div>
                    <form method="post" action="">
                	<table width="350" border="0" cellpadding="0" cellspacing="0">
                        <!--DWLayoutTable-->  
                        <thead>
                            <tr>
                                <th scope="col" style="width:20%"><center>Data</center></th>
                                <th scope="col" style="width:40%"><center>Hora</center></th>
                                <th scope="col" style="width:40%"><center>Ação</center></th>
                            </tr>
                        </thead>
                           	<?php
                            //$sql = "select cadastro.idcadastro, cadastro.login, cadastro.senha, cadastro.email, cadastro.bicho, cadastro.nome, atividade.data_acesso, atividade.hora_acesso from cadastro, atividade where cadastro.idcadastro = atividade.idcadastro";
                         	$sql = "select a.*, b.* from atividade a, tipo_acao b where a.idtipo_acao=b.idtipo_acao and a.idcadastro = '$id';";
                            $query = mysql_query($sql) or die (mysql_error());
                            while($linha = mysql_fetch_array($query)){
                            ?>
                        <tbody>  
                            <tr>
                                <td><center><?=$linha['data_acao']?></center></td>
                                <td>
                                	<div class="left">
                                    	<input type="text" name="hora_acao[<?=$linha['idatividade']?>]" value="<?=$linha['hora_acao']?>" size="9">
                                   	</div>
                                    <div class="clear"></div>
                                </td>
                                <td><center><?=$linha['descricao']?></center></td>
                           </tr>
                            <?
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="8" align="right">
                                <?
                                $num_usuarios = mysql_num_rows($query);
                                $total_usuarios = $num_usuarios;
                                echo "Total de Ações: ".$total_usuarios;
                                ?>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                    <div class="clearbr"></div>
                    <div class="right">
                   		<input type="submit" class="red" style="cursor:pointer;" value="Alterar Horários">
                        <input type="hidden" name="act" id="act" value="alt">
                  	</div>
                 	<div class="clear"></div>
                    </form>
                </div>
                <div class="clear"></div>
                <div class="clearbr"></div>
            </div>
            <div class="clearbr"></div>
            <div class="right">
           		<input type="button" class="bt-gray-light" value="Voltar para listagem de usuários" onClick="window.location='listar_usuarios.php'"/>
           	</div>
            <div class="clear"></div>
           	<div class="clearbr"></div>
      	</div>
  	</div>
</body>
</html>
			