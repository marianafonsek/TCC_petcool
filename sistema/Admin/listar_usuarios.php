<?php
include "../Config/config_sistema.php";
include "../validar_session_admin.php";

if($acao == 'deletar')
{	
	// deleta o usuario
	$sqlDel = "delete from cadastro where idcadastro = '".$id."'";
	$Del = mysql_query($sqlDel);
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
            <div class="form_square_white">
           		<div class="title">
                    Lista de usuarios
                </div>
                <div class="clearbr"></div>
                <table width="732" border="0" cellpadding="0" cellspacing="0">
                    <!--DWLayoutTable-->  
                    <thead>
                        <tr>
                            <th scope="col"><center>ID</center></th>
                            <th scope="col"><center>Login</center></th>
                            <th scope="col"><center>Senha</center></th>
                            <th scope="col"><center>E-mail</center></th>
                            <th scope="col"><center>Bicho</center></th>
                            <th scope="col"><center>Nome</center></center></center></th>
                            <th scope="col"><center>Qtd de Acessos</th>
                            <th scope="col"><center>Historico de Acessos</th>
                            <th scope="col"><center>Editar Usuario</center></th>
                            <th scope="col"><center>Excluir</center></th>
                        </tr>
                    </thead>
                                    <?php
                        //$sql = "select cadastro.idcadastro, cadastro.login, cadastro.senha, cadastro.email, cadastro.bicho, cadastro.nome, atividade.data_acesso, atividade.hora_acesso from cadastro, atividade where cadastro.idcadastro = atividade.idcadastro";
                                    $sql = "select * from cadastro;";
                        $query = mysql_query($sql) or die (mysql_error());
                        while($linha = mysql_fetch_array($query)){
                        ?>
                    <tbody>
             
                        
                                 
                        <tr>
                            <td><center><?=$linha['idcadastro']?></center></td>
                            <td><center><?=$linha['login']?></center></td>
                            <td><center><?=$linha['senha']?></center></td>
                            <td><center><?=$linha['email']?></center></td>
                            <td><center><? if($linha['bicho']==1){echo"Panda";}else{echo"Ursa";}?></center></td>
                            <td><center><?=$linha['nome']?></center></td>
                            <td><center><?=$linha['qtd_acesso']?></center></td>
                            
                            <?php
                    $sql2 = mysql_query("select * from atividade where idcadastro = ".$linha['idcadastro']." order by idatividade desc;");
                            $dados = mysql_fetch_array($sql2); ?>
                        
                            <td><center><a href="historico.php?id=<?=$linha['idcadastro']?>">Visualizar</a></center></td>
                            <td><center><a href="alterar_usuarios.php?id=<?=$linha['idcadastro']?>">Editar</a></center></td>
                            <td></center><a href="?acao=deletar&id=<?=$linha['idcadastro']?>">Excluir</a></center></td>
                       </tr>
                        <?
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="10" align="right">
                            <?
                            $num_usuarios = mysql_num_rows($query);
                            $total_usuarios = $num_usuarios;
                            echo "<b>".$total_usuarios."</b> Usuários Cadastrados";
                            ?>
                            </td>
                        </tr>
                    </tfoot>
                </table> 
            </div>
            <div class="clearbr"></div>
      	</div>
  	</div>
</body>
</html>
			