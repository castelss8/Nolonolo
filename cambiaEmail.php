<?php
require '../connection.php';
global $pdo;
$email = $_SESSION['EmailUtente'];
$presente = false;
$newEmail = $_POST['inputEmail'];
try{
    $sql = "SELECT email
                FROM utente;";
    $res = $pdo -> query($sql);
}catch(PDOException $e){echo $e->getMessage();}
while ($row = $res->fetch()){
    if ($newEmail==$row['email']){
        echo "<script>alert('Email già presente nel sistema.')</script>";
        echo "<script>window.open('../myAccount-profilo.php','_self')</script>";
        $presente = true;
    }
}
if(!$presente) {
    try {
        $sql = "UPDATE utente
                    set email = '$newEmail'
                    where email = '$email';";
        $res = $pdo->query($sql);

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $_SESSION['EmailUtente']=$newEmail;
    echo "<script>alert('Email correttamente modificata.')</script>";
    echo "<script>window.open('../myAccount-profilo.php','_self')</script>";
    }

?>