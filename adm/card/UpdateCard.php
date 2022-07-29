<!DOCTYPE html>
<html lang="pt-br">

<?php
    
    require_once '../Conn.php';
    require_once './ClassCard.php';

    $list = new Card();
    $result = $list->listCardId();

    foreach ($result as $row) {
        extract($row);
    }
    
    ?>
    
    
<head>
    <title>Painel Administrativo</title>
    <meta charset="utf-8">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="shortchu icon" href="./img/logo.png">
</head>

    
<body>
    <header>
    <?php require_once '../header.php' ?>
</header>
    
<main>

<!-- ALTERAÇÃO DOS CAMPPOS COM TEXTO -->        

<section class="container">
 <form method="POST" class="dv-form">

     <input type="hidden" name="id" value="<?php echo "$id" ?>">  
     
     <label>Cliente</label>
     <input type="text" name="cliente" value="<?php echo "$cliente" ?>">       
     
     <label>Empresa</label>
     <input type="text" name="empresa" value="<?php echo "$empresa" ?>"> 
     
     <label>Subdomínio</label>
     <input type="text" name="subdominio" value="<?php echo "$subdominio" ?>"> 
     
      <a href="./ListCard.php">
         <button type="button" class="bt-darkblue">Cancelar</button>
     </a>
       
     <button type="submit" name="salvar" value="salvar" class="bt-orange">Alterar</button>
     
     <?php 
   
     if(isset($_POST['cliente'])){
            
        $Update = new Card();
        $Update->updateCard();
     }
          
     ?>
    
    </form>
</section>

<section class="container">
    <div class="box-card">
        <h1>Logomarca</h1>
        <img src="<?php echo "../img/$subdominio/".$logo ?>" width="100"><br>
        <a href="./UpdateCardLogo.php<?php echo "?id=$id" ?>">
          <button class="bt-orange">Alterar Logo</button>
        </a>
    </div>
</section>



<section class="container">
    <div class="box-card">
        <h1>Favicon</h1>
        <img src="<?php echo "../img/$subdominio/".$icon ?>" width="100"><br>
        <a href="./UpdateCardIcon.php<?php echo "?id=$id" ?>">
            <button class="bt-orange">Alterar Favicon</button>
        </a>
    </div>
</section>

    
    
<section class="container">
    <div class="box-card">
        <h1>Capa</h1>
        <img src="<?php echo "../img/$subdominio/".$img_destaque ?>" width="100"><br>
        
        <button class="bt-orange">Alterar Capa</button>
    </div>
</section>

    
    
<section class="container">
    <div class="box-card">
        <h1>Card</h1>
        <img src="<?php echo "../img/$subdominio/".$card ?>" width="100"><br>
        
        <button class="bt-orange">Alterar Card</button>
    </div>
</section>


    
</main>
    
<footer>
    <?php require_once '../footer.php' ?>
</footer>
    
    <main>
   
    </main>
</body>
</html>
    