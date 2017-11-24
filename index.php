<?php 
include ("conexao.php");
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Desafio Voxus</title>
		<script src="https://apis.google.com/js/platform.js" async defer></script>
		<meta name="google-signin-client_id" content="330740747565-qscoi30ivqmeoghuf6r7ht7iq8gob5r9.apps.googleusercontent.com">
    </head>
    <body>
		Bem vindo a Dashboard 
              
                <div class="g-signin2" data-onsuccess="onSignIn"></div>
		
		<p id='msg'></p>
		<script>
		function onSignIn(googleUser) {
                    var profile = googleUser.getBasicProfile();
                    var userID = profile.getId();
                    var userName = profile.getName();
                    var userPicture = profile.getImageUrl();
                    var userEmail = profile.getEmail();
                    var userToken = googleUser.getAuthResponse().id_token;
                    
                    
                    if(userEmail !== ''){
                        var dados = {
                            userID:userID,
                            userName:userName,
                            userPicture:userPicture,
                            userEmail:userEmail
                        };
                        $.post('valida.php', dados, function(retorna){
                            if(retorna === '"Erro"'){
                                var msg = "Usuario não encontrado com esse email";
                                document.getElementById('msg').innerHTML = msg;
                            }else{
                                window.location.href = retorna;
                            }
                        });
                    }else{
                       var msg = "usuário não encontrado"  
                       document.getElementById('msg').innerHTML = msg;
                    }
                }
		</script>	
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		
		
    </body>
</html>