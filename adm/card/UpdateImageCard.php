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
    
    $id_cliente = $_GET['id'];
    $sub = $_GET['sub'];
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
        
<section class="container">
 <form method="POST" enctype="multipart/form-data" class="dv-form">
       <?php
            require_once '../Conn2.php';
            $listcard = $conn2->query("SELECT * FROM card WHERE id = $id_card");
            foreach ($listcard as $rowcard) {
            ?>
             <img src="<?php echo "../img/".$rowcard['subdominio']."/".$rowcard['logo']?>"  width="100px;"><br>
            <?php
            }
    
    $list = new Card();
    $result = $list->listCardId();

    foreach ($result as $row) {
        extract($row);
    }
     ?>   
        
       <?php 
    $list2 = new Card();
    $result2 = $list2->listImgCardId2();
    
    foreach ($result2 as $row2) {
        extract($row2);
        ?>
        
     <input type="hidden" name="id" value="<?php echo $id ?>">  
     <input type="hidden" name="id_cliente" value="<?php echo $id_cliente ?>">  
         
     <img src="<?php echo "../img/".$sub."/".$img?>"  class="img-box-card">
     <label>Titulo</label>
     <input type="text" name="titulo" value="<?php echo $titulo ?>"> 
    
     <div class="form-diplay-flex">
     
     <label>Orientação</label>
     <select name="orientacao">
         <?php if($orientacao == 0){ 
            ?><option value="0" selected>Paisagem</option><?php
        }else{
            ?><option value="1" selected>Retrato</option><?php
        }
         ?>
        <option value="0">Paisagem</option>
        <option value="1">Retrato</option>
     </select>
          
     <label>Ordem</label>
       
     <input type="number" name="ordem" value="<?php echo $ordem ?>"> 
     </div>
     <button type="submit" name="salvar" value="salvar" class="bt-orange">Alterar</button>
   
     <a href="ViewCard.php<?php echo "?id=$id_cliente" ?>">
     <button type="button" class="bt-darkblue">Voltar</button></a>
    
    
     <?php 
   
    if(isset($_POST['titulo'])){
            $create = new Card();
            $create->updateImgCard();
    
    
    }}
     
            
    ?>
    
    </form>
</section>


     
    
<section class="container">
   
    <?php
    /********* imagens *********///
    $id_card = $_GET['id'];
  
    
    
    $list = new Card();
    $result = $list->listImgCardId();
    

    foreach ($result as $row) {
        extract($row);
        ?>
    
    <div class="box-card">
        <h4><?php echo $titulo ?></h4>
        <img src="<?php echo "../img/".$subdominio."/".$img?>"  class="img-box-card">
        
        <p>Titulo: <?php echo $titulo ?></p>
        <p>Orientação: <?php echo $orientacao ?></p>
        <p>Ordem: <?php echo $ordem ?></p>
        
        <a href="DeleleImagemCard.php<?php echo "?id=$id&id_card=$id_card" ?>">
        <button type="button" class="bt-black">Excluir</button></a>
        
         <a href="UpdateImagemCard.php<?php echo "?id=$id&id_card=$id_card" ?>">
        <button type="button" class="bt-orange">Alterar</button></a>

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
    