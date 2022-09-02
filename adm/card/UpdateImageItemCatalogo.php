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
    
    $id_item = $_GET['id'];
    $subdominio = $_GET['subdominio'];
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
            $listitem = $conn2->query("SELECT * FROM item_catalogo WHERE id = $id_item");
            foreach ($listitem as $rowitem) {
            ?>
            
            <img src="<?php echo "../img/".$subdominio."/".$rowitem['img']?>"  width="300px;"><br>
            <?php
        
    }
    
   ?>
    <input type="text" name="id" value="<?php echo $rowitem['id']?>">

    <input type="file" name="img"> 
    <button type="submit" name="salvar" value="salvar" class="bt-orange">Alterar</button>
   
     <a href="ViewCard.php<?php echo "?id=$id_cliente" ?>">
  
     <?php $arqvuivoAntigo = $rowitem['img']; ?>
     
     <button type="button" class="bt-darkblue">Voltar</button></a>
    
    
     <?php 
   
    if(isset($_POST['id'])){
        $formatfiles = array("png","jpg","jpeg","gif");
        $extensao = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
        
        if(in_array($extensao, $formatfiles)){
            
            $pasta = "../img/$subdominio/";
            $tmp = $_FILES['img']['tmp_name']; 
            $novoNome = $_FILES['img']['name'];
           
            
            if(move_uploaded_file($tmp, $pasta.$novoNome)){
    
                $pasta = "../img/$subdominio/";
                $del = $arqvuivoAntigo;
                unlink ($pasta.$del);
                
                $Update = new Card();
                $Update->UpdateImagemItemCatalogo();
                
        }else{
            
         ?>
            <br>
            <?php echo "Formato de imagem não aceita, somente jpg, png, jpeg e gif";?>
        <?php
        }
    }
    
    
    }
     
            
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
    