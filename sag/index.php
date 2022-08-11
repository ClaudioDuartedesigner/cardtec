<head>    
    <meta http-equiv="refresh" content="1; URL='<?php echo "https://card.tec.br/card-details.php?id=45" ?>"/>    
</head>


<!DOCTYPE html>
<html lang="pt-br">

<?php
    require_once '../adm/Conn2.php';
    $id_card_cliente = "45";
    $id_card = $id_card_cliente;
    $id_cliente = $id_card_cliente;

    $list = $conn2->query("SELECT * FROM card WHERE id = $id_card");
    
     while ($line=$list->fetch(PDO::FETCH_ASSOC)){?>


<head>
    <title>Card.Tec</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style-main.css">
    <link rel="icon" href="<?php echo "../adm/img/".$line['subdominio']."/".$line['icon']?>">
    
    <meta property="og:image" content="<?php echo "../adm/img/".$line['subdominio']."/".$line['img_destaque']?>">
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="200"> 
    <meta property="og:image:height" content="200"> 
    <meta name='description' content='<?php echo $line['empresa']?>'>
	
</head>
<?php } ?>

<section class="container-card-details">
<?php

   
    $list = $conn2->query("SELECT * FROM card WHERE id = $id_card");
    
    while ($line=$list->fetch(PDO::FETCH_ASSOC)){
        ?>
    
        <img src="<?php echo "../adm/img/".$line['subdominio']."/".$line['logo']?>"  class="img-logo">
        
        <h1><?php echo $line['empresa'] ?></h1>
    <?php
    }
        
    
    /********* BLOCOS *********///
    
    $list = $conn2->query("SELECT * FROM blocos WHERE id_cliente = $id_cliente");
    
    while ($line=$list->fetch(PDO::FETCH_ASSOC)){
        ?>
   
        <h1 class="h1-title-card"><?php echo $line['titulo'] ?></h1>
        <p class="p-block-card"><?php echo $line['descricao'] ?></p>
    
    <?php
    }?>
    
    
    <?php
     /********* WHATSAPP *********///
    
     $list = $conn2->query("SELECT * FROM whatsapp WHERE id_cliente = $id_cliente");
    
     while ($line=$list->fetch(PDO::FETCH_ASSOC)){
        ?>
        
        <a href="https://api.whatsapp.com/send?phone=55<?php echo $line['link'] ?>&text=Oi, gostaria de mais informações">
            <img src="<?php echo $line['img'] ?>"  class="img-social"></a>
    
    <?php
    }?>
    
    
    <?php
     /********* INSTAGRAM *********///
    
   $list = $conn2->query("SELECT * FROM instagram WHERE id_cliente = $id_cliente");
    
     while ($line=$list->fetch(PDO::FETCH_ASSOC)){
        ?>
        
        <a href="<?php echo $line['link'] ?>">
            <img src="<?php echo $line['img'] ?>" class="img-social"></a>
    
    <?php
    }?>
   
      
   
      <?php
     /********* FACEBOOK *********///
    
     $list = $conn2->query("SELECT * FROM facebook WHERE id_cliente = $id_cliente");
    
     while ($line=$list->fetch(PDO::FETCH_ASSOC)){
        ?>
        
        <a href="<?php echo $line['link'] ?>">
            <img src="<?php echo $line['img'] ?>" class="img-social"></a>
    
    <?php
    }?>
   
    
    
     <?php
     /********* SITE *********///
    
     $list = $conn2->query("SELECT * FROM site WHERE id_cliente = $id_cliente");
    
     while ($line=$list->fetch(PDO::FETCH_ASSOC)){
        ?>
        
        <a href="<?php echo $line['link'] ?>">
            <img src="<?php echo $line['img'] ?>" class="img-social"></a>
    
    <?php
    }?>
    
    
      <?php
     /********* MAPS *********///
    
   $list = $conn2->query("SELECT * FROM maps WHERE id_cliente = $id_cliente");
    
     while ($line=$list->fetch(PDO::FETCH_ASSOC)){
        ?>
        
        <a href="<?php echo $lina['link'] ?>">
            <img src="<?php echo $line['img'] ?>" class="img-social"></a>
    
    <?php
    }?>
    
</section>  
    
<section class="container-card-details">
  
        <?php
     /********* LINKS *********///
    
    $list = $conn2->query("SELECT * FROM links WHERE id_cliente = $id_cliente");
    
     while ($line=$list->fetch(PDO::FETCH_ASSOC)){
        ?>
        
        <a href="<?php echo $line['link'] ?>">
            <button><?php echo $line['nome'] ?></button></a>
    
    <?php
    }?>
   
</section>
    
<footer class="footer-main">
    <?php require_once '../footer-main.php' ?>
</footer>
    
