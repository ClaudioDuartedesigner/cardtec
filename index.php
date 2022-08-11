
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Card.Tec</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/style-main.css">
    <link rel="icon" href="https://card.tec.br/img/logo.png">
    
    <meta property="og:image" content="https://card.tec.br/img/capa.jpg">
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="200"> 
    <meta property="og:image:height" content="200"> 
    <meta name='description' content='Seu cartão de vistas digital!'>
	
</head>
 <body>   
<header class="header-main">
    <?php require_once './header-main.php' ?>
</header>

<section>
    <?php require_once './cards.php'; ?>
</section>
    
<footer class="footer-main">
    <?php require_once './footer-main.php' ?>
</footer>
</body>
</html>