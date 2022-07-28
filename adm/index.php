<?php
     require_once './User.php';
     
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Painel Administrativo</title>
    <meta charset="utf-8">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="shortchu icon" href="./img/logo.png">
</head>

<body>
    
    <section class="container">
        <a href="https://card.tec.br/">
            <img src="https://card.tec.br/img/logo.png" width="70px;">
        </a>
    </section>
    
    <section class="container">

        <div class="box">
        
            <h1>Faça o seu login</h1>
            
            <form action="" method="post" class="form-login">
            
            <label>E-mail</label>
            <input type="text" name="email" placeholder="Seu e-mail aqui">            
            
            <label>Senha</label>
            <input type="password" name="senha" placeholder="sua senha aqui">            
      
            <button type="submit" class="bt-confirm">Acessar</button>
            
            <a href="https://duartgrafica.com.br/">
                <button type="button" class="bt-cancel">Cancelar</button>
            </a>
                
            <?php

                if(isset($_POST['email'])){

                    $User_Access = new User();
                    $User_Access->User_Access();
            } 

            ?>
                
           </form>
   
        </div>
    
    </section>
    
    <section class="container">
        <a href="https://duartgrafica.com.br/">
            <img src="./img/claudioduarte.png" width="150px;">
        </a>
    </section>
    
    <section class="container">
        <a href="https://duartgrafica.com.br/">
            <h6>Desenvolvido por: Claudio Duarte Designer</h6>
        </a>
    </section>    
</body>
    
</html>

            
            
            

            
            