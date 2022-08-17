
<!DOCTYPE html>
<html lang="pt-br">
<?php
   require_once './adm/Conn.php';
   require_once './adm/Card/ClassCard.php';
    
     $list = new Card();
    $result = $list->listCardId();

    foreach ($result as $row) {
        extract($row);?>

    <head>
    <title><?php echo $empresa ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/style-main.css">
    <link rel="icon" href="https://card.tec.br/adm/img/<?php echo $subdominio."/".$icon ?>">
    
    <meta property="og:image" content="https://card.tec.br/adm/img/<?php echo $subdominio."/".$img_destaque ?>">
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="200"> 
    <meta property="og:image:height" content="200"> 
    <meta name='description' content='www.<?php echo $subdominio ?>.card.tec.br'>
    
	
</head>
    
<?php
    }
?>
    
<section class="container-card-details">
<?php
 
 
    $list = new Card();
    $result = $list->listCardId();

    foreach ($result as $row) {
        extract($row);?>
   
        <img src="<?php echo "./adm/img/".$subdominio."/".$logo?>"  class="img-logo">
        
        <h1><?php echo $empresa ?></h1>
    <?php
    }
        
    
    /********* BLOCOS *********///
    
    $list = new Card();
    $result = $list->listBlockCardId();

    foreach ($result as $row) {
        extract($row);?>
   
        <h1 class="h1-title-card"><?php echo $titulo ?></h1>
        <p class="p-block-card"><?php echo $descricao ?></p>
    
    <?php
    }?>
    
    
    <?php
     /********* WHATSAPP *********///
    
    $list = new Card();
    $result = $list->listLinkWhatsappId();

    foreach ($result as $row) {
        extract($row);?>
        
        <a href="https://api.whatsapp.com/send?phone=55<?php echo $link ?>&text=Oi, gostaria de mais informações"  target="_blank">
            <img src="<?php echo $img ?>"  class="img-social"></a>
    
    <?php
    }?>
    
    
    <?php
     /********* INSTAGRAM *********///
    
    $list = new Card();
    $result = $list->listLinkInstagramId();

    foreach ($result as $row) {
        extract($row);?>
        
        <a href="<?php echo $link ?>" target="_blank">
            <img src="<?php echo $img ?>" class="img-social"></a>
    
    <?php
    }?>
   
      
   
      <?php
    /********* FACEBOOK *********///
    
    $list = new Card();
    $result = $list->listLinkFacebookId();

    foreach ($result as $row) {
        extract($row);?>
        
        <a href="<?php echo $link ?>" target="_blank">
            <img src="<?php echo $img ?>" class="img-social"></a>
    
    <?php
    }?>
   
    <?php
     /********* SITE *********///
    
    $list = new Card();
    $result = $list->listLinkSiteId();

    foreach ($result as $row) {
        extract($row);?>
        
        <a href="<?php echo $link ?>" target="_blank">
            <img src="<?php echo $img ?>" class="img-social"></a>
    
    <?php
    }?>
 
    <?php
     /********* MAPS *********///
    
    $list = new Card();
    $result = $list->listLinkMapsId();

    foreach ($result as $row) {
        extract($row);?>
        
        <a href="<?php echo $link ?>" target="_blank">
            <img src="<?php echo $img ?>" class="img-social"></a>
    
    <?php
    }?>
    

<section class="container-card-details">
  
        <?php
     /********* links *********///
    
    $list = new Card();
    $result = $list->listLinkCardId();

    foreach ($result as $row) {
        extract($row);?>
        
        <a href="<?php echo $link ?>">
            <button class="bt-green"><?php echo $nome ?></button></a>
    
    <?php
    }?>
   
</section>

<section class="container">
    
    <?php 
    /********* CATALOGO *********///
       $list = new Card();
    $result = $list->listItemCatalogoCardId();
    

    foreach ($result as $row) {
        extract($row);
        ?>
    
    <div class="box-catalago">
        <img src="<?php echo "./adm/img/".$subdominio."/".$img?>"  class="img-catalogo">
         <h4><?php echo $titulo ?></h4>
        <p><?php echo $descricao ?></p>
          <p><?php echo $codigo ?></p>
        <p><?php /* echo "R$ " . number_format($valor,2) */ ?></p>
        <a href="https://api.whatsapp.com/send?phone=55<?php echo $whatsapp ?> &text=Oi, quero <?php echo $mensagem ?>">
            <button class="bt-green">Quero Este</button></a>
    </div>  
    <?php } ?>
        
</section>

    
<section class="container">
  
    <?php
     
    
    $list = new Card();
    $result = $list->listImgCardId();

    foreach ($result as $row) {
        extract($row);?>
    <div class="box-card">
        <h4><?php echo $titulo ?></h4>
        <img src="<?php echo "./adm/img/".$subdominio."/".$img?>"  class="img-card">
    </div>
    <?php
    }?>
   
</section>
    
</section>  
    

    
<footer class="footer-main">
    <?php require_once './footer-main.php' ?>
</footer>
    
