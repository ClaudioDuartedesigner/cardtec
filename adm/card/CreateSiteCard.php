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
    
    $id_card = $_GET['id_card'];
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
---------------------CADASTRANDO MAPS----------------
-------------------------------------------------------->    
    
<section class="container-2">
<form method="POST" class="dv-form">
     <img src="https://card.tec.br/img/site.png" width="50px;">
    <h1 class="label-title">Inserir Maps</h1>
    <input type="hidden" name="id_cliente" value="<?php echo $id_card ?>">  
    <input type="hidden" name="img_site" value="<?php echo "https://card.tec.br/img/site.png" ?>">
    <input type="text" name="link_site">
    <button type="submit" name="salvar" value="salvar" class="bt-green">Adicionar</button>
    <?php 
    if(isset($_POST['id_cliente'])){
        $create = new Card();
        $create->createlinkSite();
    }
    ?>
    </form>
</section>    

<section class="container">
    <a href="../home.php">
    <button class="bt-darkblue">Home</button></a>
</section>    

</main> 

<footer>
    <?php require_once '../footer.php' ?>
</footer>

</body>
</html>
    