<?php
require '../connection.php';
global $pdo;
$email = $_SESSION['EmailUtente'];

$newNome = $_POST['inputNome'];
try{
    $sql = "UPDATE utente
                set nome = '$newNome'
                where email = '$email';";
    $res = $pdo -> query($sql);

}catch(PDOException $e){echo $e->getMessage();}
echo "<script>alert('Nome correttamente modificato.')</script>";
echo "<script>window.open('../myAccount-profilo.php','_self')</script>";
?>