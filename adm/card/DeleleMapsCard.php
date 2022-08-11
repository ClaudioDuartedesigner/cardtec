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

$sql = $conn2->prepare("DELETE FROM maps WHERE id = $id_get");

$sql->bindValue(":id",$id);
$sql->execute();    

 header ("location: ./ListLinkCard.php?id=$id_card");
return true;
?>
