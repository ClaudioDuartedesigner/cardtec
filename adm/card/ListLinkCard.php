<?php
session_start();
ob_start();
?>

<?php
if(!isset($_SESSION["user"])){
    header("location: ./errologin.php");
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<?php
    require_once '../Conn.php';
    require_once './ClassCard.php';
    
    $id_card = $_GET['id'];
    echo $id_card;
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


<!-----------------------------------------------------------
---------------------LISTAGEN WHATSAPP----------------
-------------------------------------------------------->        
<section class="container-block">
  <?php
   $list = new Card();
   $result=$list->listlinkWhatsappId();
    
    foreach ($result as $row) {
        extract($row);?>
     <div class="box-card-links">
        <img src="<?php echo "$img" ?>" class="img-social">
        <p><?php  echo $link ?></p>
 
        <a href="CreateWhatsappCard.php<?php echo "?id=$id&id_card=$id_card" ?>">
        <button class="bt-green">Novo</button></a>
     
        <a href="DeleleWhatsappCard.php<?php echo "?id=$id&id_card=$id_card" ?>">
        <button class="bt-black">Excluir</button></a>
    </div>
    <?php
    }
    ?>

<!-----------------------------------------------------------
---------------------LISTAGEN SITE----------------
-------------------------------------------------------->        
<section class="container-block">
  <?php
   $list = new Card();
   $result=$list->listlinkSiteId();
    
    foreach ($result as $row) {
        extract($row);?>
     <div class="box-card-links">
        <img src="<?php echo "$img" ?>" class="img-social">
        <p><?php  echo $link ?></p>
 
        <a href="CreateSiteCard.php<?php echo "?id=$id&id_card=$id_card" ?>">
        <button class="bt-green">Novo</button></a>
    
        <a href="DeleleSiteCard.php<?php echo "?id=$id&id_card=$id_card" ?>">
        <button class="bt-black">Excluir</button></a>
    </div>
    <?php
    }
    ?>


<!-----------------------------------------------------------
---------------------LISTAGEN INSTAGRAM----------------
-------------------------------------------------------->        
<?php
   $list = new Card();
   $result=$list->listlinkInstagramId();
    
    foreach ($result as $row) {
        extract($row);?>
     <div class="box-card-links">
        <img src="<?php echo "$img" ?>" class="img-social">
        <p><?php  echo $link ?></p>
 
        <a href="CreateInstagramCard.php<?php echo "?id=$id&id_card=$id_card" ?>">
        <button class="bt-green">Novo</button></a>
    
        <a href="DeleleInstagramCard.php<?php echo "?id=$id&id_card=$id_card" ?>">
        <button class="bt-black">Excluir</button></a>
    </div>
    <?php
    }
    ?>
    
 
<!-----------------------------------------------------------
---------------------LISTAGEN FACEBOOK----------------
-------------------------------------------------------->        
<?php
   $list = new Card();
   $result=$list->listLinkFacebookId();
    
    foreach ($result as $row) {
        extract($row);?>
     <div class="box-card-links">
        <img src="<?php echo "$img" ?>" class="img-social">
        <p><?php  echo $link ?></p>
 
        <a href="CreateFacebookCard.php<?php echo "?id=$id&id_card=$id_card" ?>">
        <button class="bt-green">Novo</button></a>
    
        <a href="DeleleFacebookCard.php<?php echo "?id=$id&id_card=$id_card" ?>">
        <button class="bt-black">Excluir</button></a>
    </div>
    <?php
    }
    ?>
       

<!-----------------------------------------------------------
---------------------LISTAGEN MAPS----------------
-------------------------------------------------------->        
<?php
   $list = new Card();
   $result=$list->listLinkMapsId();
    
    foreach ($result as $row) {
        extract($row);?>
     <div class="box-card-links">
        <img src="<?php echo "$img" ?>" class="img-social">
        <p><?php  echo $link ?></p>
 
        <a href="CreateFacebookCard.php<?php echo "?id=$id&id_card=$id_card" ?>">
        <button class="bt-green">Novo</button></a>
    
        <a href="DeleleMapsCard.php<?php echo "?id=$id&id_card=$id_card" ?>">
        <button class="bt-black">Excluir</button></a>
    </div>
    <?php
    }
    ?>
       
     
<!-----------------------------------------------------------
---------------------LISTAGEN LINKS----------------
-------------------------------------------------------->        
<?php
   $list = new Card();
   $result=$list->listLinkCardId();
    
    foreach ($result as $row) {
        extract($row);?>
     <div class="box-card-links">
         <p><?php echo "$nome" ?></p>
        <p><?php  echo $link ?></p>
 
        <a href="CreateFacebookCard.php<?php echo "?id=$id&id_card=$id_card" ?>">
        <button class="bt-green">Novo</button></a>
    
        <a href="DeleleLinkCard.php<?php echo "?id=$id&id_card=$id_card" ?>">
        <button class="bt-black">Excluir</button></a>
    </div>
    <?php
    }
    ?>
    
</section>
<section class="container-block">
    <a href="CreateWhatsappCard.php<?php echo "?id_card=$id_card" ?>">
         <button class="bt-darkblue">+ Whatsapp</button>
    </a>
    
    <a href="CreateInstagramCard.php<?php echo "?id=$id&id_card=$id_card" ?>">
        <button class="bt-darkblue">+ Instagram</button>
    </a>
    
    <a href="CreateFacebookCard.php<?php echo "?id=$id&id_card=$id_card" ?>">
        <button class="bt-darkblue">+ Facebook</button>
    </a>
    
    <a href="CreateMapsCard.php<?php echo "?id=$id&id_card=$id_card" ?>">
        <button class="bt-darkblue">+ Maps</button>
    </a>
    
     <a href="CreateSiteCard.php<?php echo "?id=$id&id_card=$id_card" ?>">
        <button class="bt-darkblue">+ Site</button>
    </a>
    
    <a href="CreateLinkCard.php<?php echo "?id=$id&id_card=$id_card" ?>">
        <button class="bt-darkblue">+ Links</button></a>
    
</section>    
    
    
<section class="container-block">
<a href="../home.php">
<button class="bt-darkblue">Home</button></a>
</section>
    </section> 
    </main>
<footer>
    <?php require_once '../footer.php' ?>
</footer>
    

</body>
</html>
    