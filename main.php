<?php
session_start();
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php include("conexao.php");
    $grupo = SelecaoTodosClientes();
    //var_dump($grupo);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>DesafioVoxus</title>
        <script src="https://apis.google.com/js/platform.js" async defer></script>
		<meta name="google-signin-client_id" content="330740747565-qscoi30ivqmeoghuf6r7ht7iq8gob5r9.apps.googleusercontent.com">
    </head>
    <body>
        <h1> Dashboard de Tasks </h1>
        Bem vindo <?php echo $_SESSION['userName']; ?>!
        </br>
        <a href="Inserir.php">Adicionar Task</a> 
        <table border="1">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descricao</th>
                    <th>Anexos</th>
                    <th>Prioridade</th>
                    <th>Usuário</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach ($grupo as $pessoa){ ?>
                <tr>
                    <td><?=$pessoa["nome"]?></td>
                    <td><?=$pessoa["descricao"]?></td>
                    <td><?=$pessoa["anexos"]?></td>
                    <td><?=$pessoa["prioridade"]?></td>
                    <td><?=$pessoa["usuario"]?></td>
                    <td>
                        <form name="editar" action="editar.php" method="POST">
                           <input type="hidden" name="id" value=<?=$pessoa["id"]?>/>
                           <input type="submit" value="Editar" name="editar" />
                        </form>  
                    </td>
                    <td>
                        <form name="excluir" action="conexao.php" method="POST">
                            <input type="hidden" name="id" value="<?=$pessoa["id"]?>" />
                            <input type="hidden" name="acao" value="excluir" />
                            <input type="submit" value="Excluir" name="excluir" />
                        </form>
                    </td>
                </tr>
                
                
                <?php }
                
                ?>
                
                
            </tbody>
        </table>
        </br>
                <a href="index.php" onclick="signOut();">Sair</a>
		<script>
		  function signOut() {
			var auth2 = gapi.auth2.getAuthInstance();
			auth2.signOut().then(function () {
			  console.log('User signed out.');
			});
		  }
		</script>
        <?php
        // put your code here
        ?>
    </body>
</html>
