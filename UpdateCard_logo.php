<!DOCTYPE html>
<html lang="pt-br">

<?php
    
    require_once '../Conn.php';
    require_once './ClassCard.php';

    $list = new Card();
    $result = $list->listCardId();

    foreach ($result as $row) {
        extract($row);
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

<!-- ALTERAÇÃO DOS CAMPPOS COM TEXTO -->        

<section class="container">
 <form method="POST" class="dv-form">

     <input type="hidden" name="id" value="<?php echo "$id" ?>">  
     
     <label>Cliente</label>
     <input type="text" name="cliente" value="<?php echo "$cliente" ?>">       
     
     <label>Empresa</label>
     <input type="text" name="empresa" value="<?php echo "$empresa" ?>"> 
     
     <label>Subdomínio</label>
     <input type="text" name="subdominio" value="<?php echo "$subdominio" ?>"> 
       
     <button type="submit" name="salvar" value="salvar">Alterar</button>
     
     <?php 
   
     if(isset($_POST['cliente'])){
            
        $Update = new Card();
        $Update->updateCard();
     }
          
     ?>
    
    </form>
</section>

<!-- ALTERAÇÃO DA LOGO -->        

 <section class="container">
    <form method="POST" enctype="multipart/form-data"  class="dv-form">   
        
     <input type="hidden" name="id" value="<?php echo "$id" ?>">  
     <input type="text" name="subdominio" value="<?php echo "$subdominio" ?>"> 
     <img src="<?php echo "../img/$subdominio/".$subdominio."_".$logo ?>" width="100"><br>
        
     <label>Logomarca</label>
     <input type="file" name="logo"> 
     
     <button type="submit" name="salvar" value="salvar">Alterar</button>
     
     <?php 
   
     if(isset($_POST['id'])){
        
        $formatfiles = array("png","jpg","jpeg","gif");
        $extensaoLogo = pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION);
        
         if(in_array($extensaoLogo, $formatfiles)){
            $Update = new Card();
            $Update->updateCardLogo();
    
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
    