<?php
require 'connection.php';
global $pdo;

//$email = $_SESSION['emailUtente'];
$email = "prova@prova.it";

if(isset($_POST['review'])){
    $stars = $_POST['stars'];
    $text = $_POST['text'];
    $videogioco = $_POST['videogame'];
    //Inserire timestamp
    //inserire attributo videogioco in db
}
try{
    $q="INSERT INTO recensione (email,testoR,stelle,videogioco) VALUES ('$email','$text','$stars','$videogioco')";
    $run= $pdo -> query($q);
}catch(PDOException $e){
    die($q . "<br>" . $e->getMessage());
}
echo "<script>window.open('videogioco.php?id=$videogioco','_self')</script>";
?>