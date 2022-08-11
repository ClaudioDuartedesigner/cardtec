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
 <form method="POST" class="dv-form">

     <input type="hidden" name="id" value="<?php echo "$id" ?>">  
     
     <label>Cliente</label>
     <input type="text" name="cliente" value="<?php echo "$cliente" ?>">       
     
     <label>Empresa</label>
     <input type="text" name="empresa" value="<?php echo "$empresa" ?>"> 
     
     <label>Subdomínio</label>
     <input type="text" name="subdominio" value="<?php echo "$subdominio" ?>"> 
     
     <label>Ativo: </label>
     <select name="ativo">
         <option value="<?php echo "$ativo" ?>1">  <?php 
        
        if ($ativo == "1"){
            echo "Sim";
        }else{
            echo "Não";
        }
        ?>
         </option>
         <option value="1">Sim</option>
         <option value="0">Não</option>
     </select> 
     <br>
      <a href="./ListCard.php">
         <button type="button" class="bt-darkblue">Cancelar</button>
     </a>
       
     <button type="submit" name="salvar" value="salvar" class="bt-orange">Alterar</button>
     
     <?php 
   
     if(isset($_POST['cliente'])){
            
        $Update = new Card();
        $Update->updateCard();
     }
          
     ?>
    
    </form>
</section>

<section class="container">
    
    <div class="box-card-2">
          <div class="box-card-inside-top">
        <h1>Logomarca</h1>
        
        <img src="<?php echo "../img/$subdominio/".$logo ?>" ><br>
        </div>
        <a href="./UpdateCardLogo.php<?php echo "?id=$id" ?>">
          <button class="bt-orange">Alterar</button>
        </a>
    </div>

    <div class="box-card-2">
        <div class="box-card-inside-top">
        <h1>Favicon</h1>
              
        <img src="<?php echo "../img/$subdominio/".$icon ?>"><br>
        </div>
        <a href="./UpdateCardIcon.php<?php echo "?id=$id" ?>">
            <button class="bt-orange">Alterar</button>
        </a>
    </div>

    <div class="box-card-2">
           <div class="box-card-inside-top">
        <h1>Capa</h1>
               <img src="<?php echo "../img/$subdominio/".$img_destaque ?>" class="img-capa" ><br>
            </div>
        <a href="./UpdateCardCapa.php<?php echo "?id=$id" ?>">
            <button class="bt-orange">Alterar</button>
        </a>
    </div>

    <div class="box-card-2">
         <div class="box-card-inside-top">
        <h1>Card</h1>
         
        <img src="<?php echo "../img/$subdominio/".$card ?>" class="img-card" ><br>
        </div>
        <a href="./UpdateCardCard.php<?php echo "?id=$id" ?>">
             <button class="bt-orange">Alterar</button>
        </a>
    </div>
    
    
</section>


    
</main>
    
<footer>
    <?php require_once '../footer.php' ?>
</footer>
    

</body>
</html>
    