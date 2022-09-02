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
    $val = 00.00;

    $listcard = new Card();
    $resultcard = $listcard->listCardId2();

    foreach ($resultcard as $rowcard) {
        extract($rowcard);
          
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


    
<section class="container">
 <form method="POST" enctype="multipart/form-data" class="dv-form">
     
    <?php   
    $list = new Card();
    $result = $list->listItemCatalogoCardId2();

    foreach ($result as $row) {
        extract($row);
    }
        
    ?>
     <?php  echo $empresa; ?>
     
     <img src="<?php echo "../img/".$subdominio."/".$img?>"  class="img-box-card">

     <a href="./UpdateImageItemCatalogo.php<?php echo "?id=$id&id_card=$id_card&subdominio=$subdominio" ?>">
     <button type="button" class="bt-orange-larg">Alterar Imagem</button></a>
     
     <input type="text" name="id" value="<?php echo $id ?>">  
      
     <label>Titulo</label>
     <input type="text" name="titulo" value="<?php echo $titulo ?>">      
     
     <label>Descrição</label>
     <input type="text" name="descricao"  value="<?php echo $descricao ?> ">      
     
     <label>Whatsapp</label>
     <input type="text" name="whatsapp"  value="<?php echo $whatsapp ?>">       
     
     <label>Mensagem Whatsapp</label>
     <input type="text" name="mensagem" value="<?php echo $mensagem ?>">       
     
     <label>Código produto</label>
     <input type="text" name="codigo" value="<?php echo $codigo ?>"> 
     
     <label>Valor</label>
     <input type="text" name="valor" value="<?php echo $valor ?>">       
       
     <button type="submit" name="salvar" value="salvar" class="bt-orange">Alterar</button>
   
     <a href="ViewCard.php<?php echo "?id=$id_cliente" ?>">
     <button type="button" class="bt-darkblue">Voltar</button></a>

    
    
     <?php 
   
    if(isset($_POST['titulo'])){
        
           $create = new Card();
            $create->UpdateItemcatalogoCard();
    
          }
            
            
    ?>
    
    </form>
</section>


     
    
<section class="container">
   
    <?php
    /********* imagens *********///
    $id_card = $_GET['id'];
  
    
    
    $list = new Card();
    $result = $list->listItemCatalogoCardId();
    

    foreach ($result as $row) {
        extract($row);
        ?>
    
    <div class="box-card">
        <h4><?php echo $titulo ?></h4>
        <p><?php echo $descricao ?></p>
        <p><?php echo $whatsapp ?></p>
        <p><?php echo $mensagem ?></p>
        <p><?php echo $codigo ?></p>
        <p><?php echo "R$ " . number_format($valor,2)  ?></p>
       
        <img src="<?php echo "../img/".$subdominio."/".$img?>"  class="img-box-card">
        
       
        
        <a href="DeleteItemCatalogoCard.php<?php echo "?id=$id&id_card=$id_card" ?>">
        <button type="button" class="bt-black">Excluir</button></a>
        

    </div> 
    <?php
    }?>
       
</section>
    
<section class="container">
     <a href="ViewCard.php<?php echo "?id=$id_card" ?>">
     <button type="button" class="bt-darkblue">Voltar</button></a>
</section>
    
</main>
    
<footer>
    <?php require_once '../footer.php' ?>
</footer>
    
    <main>
   
    </main>
</body>
</html>
    