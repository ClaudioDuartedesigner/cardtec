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
    
    
 <form method="POST" class="dv-form" enctype="multipart/form-data">

     <h3><?php echo $empresa ?></h3>
     <input type="hidden" name="id" value="<?php echo "$id" ?>">  
     
     <input type="hidden" name="subdominio" value="<?php echo "$subdominio" ?>"> 
     
     <img src="<?php echo "../img/$subdominio/".$icon ?>" width="300"><br>
     
     <input type="file" name="icon"> 
     
     <?php $arqvuivoAntigo = $icon; ?>
     
     <a href="./UpdateCard.php<?php echo "?id=$id" ?>">
         <button type="button" class="bt-darkblue">Cancelar</button>
     </a>
     <button type="submit" name="salvar" value="salvar" class="bt-orange">Alterar</button>
     
     <?php 
   
    if(isset($_POST['id'])){
        
        $formatfiles = array("png","jpg","jpeg","gif");
        $extensaoIcon = pathinfo($_FILES['icon']['name'], PATHINFO_EXTENSION);
        
        if(in_array($extensaoIcon, $formatfiles)){
            
            $pasta = "../img/$subdominio/";
            $tmp = $_FILES['icon']['tmp_name']; 
            $novoNome = $_FILES['icon']['name'];
           
            
            if(move_uploaded_file($tmp, $pasta.$novoNome)){
    
                $pasta = "../img/$subdominio/";
                $del = $arqvuivoAntigo;
                unlink ($pasta.$del);
                
                $Update = new Card();
                $Update->updateCardIcon();
                
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
    <div class="box-card">
       
     
        
        
    </div>
</section>



    
</main>
    
<footer>
    <?php require_once '../footer.php' ?>
</footer>
    
    <main>
   
    </main>
</body>
</html>
    