<?php
session_start();
ob_start();
?>

<?php
if(!isset($_SESSION["user"])){
    header("location: ./errologin.php");
}
?>

<?php

include_once '../Conn2.php';

$id_get = $_GET['id'];
$id_card = $_GET['id_card'];

$listCard =  $conn2->query("SELECT * FROM card WHERE id = $id_card");
while ($lineCard=$listCard->fetch(PDO::FETCH_ASSOC)){
    
$subdominio = $lineCard['subdominio'];

};

$list = $conn2->query("SELECT * FROM imagem WHERE id = $id_get");
    
while ($line=$list->fetch(PDO::FETCH_ASSOC)){
    
    $img_del = $line['img'];
    ?>
        <img src="<?php echo "../img/".$subdominio."/".$line['img']?>"  class="img-logo">
    <?php
    }

$sql = $conn2->prepare("DELETE FROM imagem WHERE id = $id_get");

$sql->bindValue(":id",$id);
$sql->execute();    

$pasta = "../img/".$subdominio."/";
unlink ($pasta.$img_del);



header ("location: ./CreateImageCard.php?id=$id_card");
return true;
?>

