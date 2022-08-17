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
        
<section class="container-block">
  <?php
    
          
    $list = new Card();
    $result=$list->listBlockCardId();
    
    foreach ($result as $row) {
        extract($row);?>
   
    <section class="container">
<form method="POST" class="dv-form">
     
   
    <input type="hidden" name="id2" value="<?php echo $id ?>">       
    <input type="hidden" name="id_cliente2" value="<?php echo $id_card ?>">       
    <label>Titulo</label> 
    <input type="text" name="titulo2" value="<?php echo $titulo ?>"> 

    <label>descricao</label>
    <textarea type="text" name="descricao2" rows="10" cols="50"><?php echo $descricao ?></textarea>
    <br>
    
    <button type="submit" name="salvar" value="salvar" class="bt-orange">Alterar</button>
    
    <a href="DeleleBlockCard.php<?php echo "?id=$id&id_card=$id_card" ?>">
    <button type="button">Excluir</button></a>
<?php 
   
if(isset($_POST['id_cliente2'])){
        
    $create = new Card();
    $create->updateBlockCard();
}
?>
</form>
</section>
  <?php
    }
    ?>
    </section>

<section class="container-2">
<form method="POST" class="dv-form">
     
    <h1 class="label-title">NOVOS BLOCOS</h1>
    <input type="hidden" name="id_cliente" value="<?php echo $id_card ?>">       
    <label>Titulo</label> 
    <input type="text" name="titulo"> 

    <label>descricao</label>
    <textarea type="text" name="descricao" rows="10" cols="50"></textarea>
    <br>

    <button type="submit" name="salvar" value="salvar" class="bt-green">Adicionar</button>

<?php 
   
if(isset($_POST['id_cliente'])){
        
    $create = new Card();
    $create->createBlockCard();
}
?>
</form>

</section>

<section class="container">
 <a href="../home.php"><button class="bt-darkblue">Home</button></a>
</section>
    
</main>
    
<footer>
    <?php require_once '../footer.php' ?>
</footer>
    
    <main>
   
    </main>
</body>
</html>
    