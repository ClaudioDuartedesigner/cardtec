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

<head>
    <title>Painel Administrativo</title>
    <meta charset="utf-8">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="shortchu icon" href="./img/logo.png">
</head>

<body>

<header>
    <?php require_once './header.php' ?>
</header>
    
<main>
        
    <section class="container">
        <div class="box">
            <a href="card/CreateCard.php">
                <button>Cadastrar Card</button>
            </a>
          
             <a href="card/ListCard.php">
                <button>Listar Card</button>
            </a>
        </div>
    </section>
        
</main>
    
<footer>
    <?php require_once './footer.php' ?>
</footer>
    
</body>

</html>