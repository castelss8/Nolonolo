<?php
require '../connection.php';
global $pdo;
$email = $_SESSION['EmailUtente'];

$newData = date('Y-m-d', strtotime($_POST['inputData']));
try{
    $sql = "UPDATE utente
                set dataNascita = '$newData'
                where email = '$email';";
    $res = $pdo -> query($sql);

}catch(PDOException $e){echo $e->getMessage();}
echo "<script>alert('Data di nascita correttamente modificata.')</script>";
echo "<script>window.open('../myAccount-profilo.php','_self')</script>";
?>