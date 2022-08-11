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

    <?php 

    $list = new Card();
    $result = $list->listCardId();

    foreach ($result as $row) {
        extract($row);
    ?>
         <div class="box-card">
            <img src="<?php echo "../img/$subdominio/".$logo ?>" class="img-box-card"><br>
             <br>
               <h1><?php echo "$empresa" ?> </h1>
             
             <a href="./UpdateCard.php<?php echo "?id=$id" ?>">
                <button>Perfil</button>
            </a>

             <a href="./CreateBlockCard.php<?php echo "?id=$id" ?>">
                <button>Blocos</button>
            </a>
             
             <a href="./ListLinkCard.php<?php echo "?id=$id" ?>">
                <button>Link</button>
            </a>
             
            <a href="./CreateImageCard.php<?php echo "?id=$id" ?>">
                <button>Imagens</button>
            </a>

         
        </div>


    <?php        
    }
    ?>
        
</section>
    
      
<section class="container-block">
<a href="../home.php">
<button class="bt-darkblue">Home</button></a>
</section>
        
</main>
    
<footer>
    <?php require_once '../footer.php' ?>
</footer>
    
    <main>
   
    </main>
</body>
</html>
    