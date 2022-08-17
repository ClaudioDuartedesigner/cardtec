    
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Card.Tec</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/style-main.css">
</head>

<body>
    <section class="container-center-block">
        <img src="https://card.tec.br/img/card-tec-br-logo.png" class="img-logo-mini">
    </section>
    
    <section class="container-center-block">
        <a href="https://www.card.tec.br/">
        <button class="bt-green">Faça já o seu!</button></a>
    </section>
 
    
    <section class="container-center-block">
        <?php
            require_once './adm/Conn2.php';
            $contagem = $conn2->query("SELECT * FROM card ");
            $total = $contagem->rowCount();
            echo "<h1>".$total."</h1>"." Cartões Digitais até agora!";
        ?>
    </section>
    
       <br>
    <section class="container-center-block">
          <a href="https://www.duartgrafica.com.br/">
              <h4>Desenvolvido por: Claudio Duarte Designer</h4></a>
    </section>
    
</body>
    
</html>