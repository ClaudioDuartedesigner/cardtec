
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Card.Tec</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/style-main.css">
    <link rel="icon" href="https://card.tec.br/img/logo.png">
    
    <meta property="og:image" content="https://card.tec.br/img/capa.jpg">
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="200"> 
    <meta property="og:image:height" content="200"> 
    <meta name='description' content='Seu cartão de vistas digital!'>
	
</head>


<main class="main-main">

<section class="container">    
<?php

    require_once './adm/Conn.php';
    require_once './adm/Card/ClassCard.php';
      
    $list = new Card();
    $result = $list->listCard();

    foreach ($result as $row) {
        extract($row);?>
    
    <div class="box-card">
        <a href="card-details.php<?php echo "?id=$id" ?>">
            <img src="<?php echo "./adm/img/".$subdominio."/".$card?>"  class="img-card">
        </a>
    </div>

    
    
    
    <?php
    }?>
    
    
  
</section>
    
</main>
    
    

