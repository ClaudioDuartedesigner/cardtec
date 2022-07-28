<!DOCTYPE html>
<html lang="pt-br">

<?php
    
    require_once '../Conn.php';
    require_once './ClassCard.php';
    
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
     
     <label>Cliente</label>
     <input type="text" name="cliente">       
     
     <label>Empresa</label>
     <input type="text" name="empresa"> 
     
     <label>Subdominio</label>
     <input type="text" name="subdominio"> 
     
      <label>Logomarca</label>
     <input type="file" name="logo"> 
     
     <label>Icone</label>
     <input type="file" name="icon"> 

     <label>Imagem Destaque</label>
     <input type="file" name="img_destaque"> 
     
     <label>card</label>
     <input type="file" name="card"> 
     
     <button type="submit" name="salvar" value="salvar">Salvar</button>
     <?php 
   
    if(isset($_POST['cliente'])){
        
        $formatfiles = array("png","jpg","jpeg","gif");
        $extensaoLogo = pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION);
        $extensaoIcon = pathinfo($_FILES['icon']['name'], PATHINFO_EXTENSION);
        $extensaoImg_destaque = pathinfo($_FILES['img_destaque']['name'], PATHINFO_EXTENSION);
        $extensaoCard = pathinfo($_FILES['card']['name'], PATHINFO_EXTENSION);
        
        if(in_array($extensaoLogo, $formatfiles)){
            $create = new Card();
            $create->createCard();
    
        }else{
            
         ?>
            <br>
            <?php echo "Formato de imagem não aceita, somente jpg, png, jpeg e gif";?>
        <?php
        }
    }
    ?>
    
    </form>
</section>
        
</main>
    
<footer>
    <?php require_once '../footer.php' ?>
</footer>
    
    <main>
   
    </main>
</body>
</html>
    