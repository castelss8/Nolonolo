<?php
require '../connection.php';
global $pdo;
$email = $_SESSION['EmailUtente'];
$newUsername = $_POST['inputUsername'];
try{
    $sql = "UPDATE utente
                set username = '$newUsername'
                where email = '$email';";
    $res = $pdo -> query($sql);

}catch(PDOException $e){echo $e->getMessage();}
echo "<script>alert('Username correttamente modificato.')</script>";
echo "<script>window.open('../myAccount-profilo.php','_self')</script>";
?>