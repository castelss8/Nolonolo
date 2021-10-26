<!--pronto, guardare db-->
<?php
require 'connection.php';
global $pdo;

$videogioco = $_REQUEST['id'];
$email = $_SESSION['emailUtente'];

try{
    $q="DELETE FROM listadesideri WHERE id='$videogioco' AND email='$email'";
    $run= $pdo -> query($q);
}catch(PDOException $e){
    die($q . "<br>" . $e->getMessage());
}
echo "<script>window.open('videogioco.php?id=$videogioco','_self')</script>";
?>