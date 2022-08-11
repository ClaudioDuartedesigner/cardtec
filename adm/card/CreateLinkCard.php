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


  
 

<section class="container-2">
<form method="POST" class="dv-form">
    <h1 class="label-title">Inserir Link</h1>
    <input type="hidden" name="id_cliente" value="<?php echo $id_card ?>">  
    <label>Nome</label>
    <input type="text" name="nome">
    <label>Link</label>
    <input type="text" name="link">
    <button type="submit" name="salvar" value="salvar" class="bt-green">Adicionar</button>
    <?php 

   
if(isset($_POST['id_cliente'])){
        
    $create = new Card();
    $create->createLinkCard();
}
?>
</form>

</section>
 <a href="../home.php">
<button>Home</button></a>
</main>
    
<footer>
    <?php require_once '../footer.php' ?>
</footer>
    
    <main>
   
    </main>
</body>
</html>
    