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
    $result = $list->listCardId();

    foreach ($result as $row) {
        extract($row);
    }
    ?>
    <img src="<?php echo "../img/".$subdominio."/".$logo?>"  width="100px;"><br>
     
     <input type="hidden" name="id_cliente" value="<?php echo $id_cliente ?>">  
     <input type="hidden" name="subdominio" value="<?php echo $subdominio ?>">  
    
      <label>Titulo</label>
     <input type="text" name="titulo">       
     
     <label>Imagem</label>
     <input type="file" name="img"> 
     
     <div class="form-diplay-flex">
        <div> <select name="orientacao">
            <option value="0">Paisagem</option>
            <option value="1">Retrato</option>
         </select>
        </div>
        <?php
            require_once '../Conn2.php';
            $listcard = $conn2->query("SELECT * FROM imagem WHERE id_cliente = $id_cliente ORDER BY ordem ASC");
         
            $contagem = $listcard->rowCount() ;
            /*echo $contagem;*/
            
            foreach ($listcard as $rowcard) {
            /*echo $rowcard['ordem'];*/
            }
         
        ?>
         <div>Ordem:<input type="number" name="ordem" value="<?php  echo $rowcard['ordem'] + 1; ?>" class="input-number"> </div>
         
     </div>
     <button type="submit" name="salvar" value="salvar" class="bt-green">Salvar</button>
   
     <a href="ViewCard.php<?php echo "?id=$id_cliente" ?>">
     <button type="button" class="bt-darkblue">Voltar</button></a>

    
    
     <?php 
   
    if(isset($_POST['titulo'])){
        
        $formatfiles = array("png","jpg","jpeg","gif");
        $extensao = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
        
        if(in_array($extensao, $formatfiles)){
            $create = new Card();
            $create->createImgCard();
    
        }else{
            
         ?>
            <br>
            <?php echo "Formato de imagem n??o aceita, somente jpg, png, jpeg e gif";?>
        <?php
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
        <p>Orienta????o: <?php echo $orientacao ?></p>
        <p>Ordem: <?php echo $ordem ?></p>
        
        <a href="DeleleImagemCard.php<?php echo "?id=$id&id_card=$id_card" ?>">
        <button type="button" class="bt-black">Excluir</button></a>
        
         <a href="UpdateImageCard.php<?php echo "?id=$id&id_card=$id_card&sub=$subdominio" ?>">
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
    