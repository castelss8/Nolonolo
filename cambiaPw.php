<?php
require '../connection.php';
global $pdo;
$email = $_SESSION['EmailUtente'];
try{
    $sql = "SELECT passwordUtente
            FROM utente
            WHERE email = '$email';";
    $res = $pdo -> query($sql);
    $row= $res->fetch();
}catch(PDOException $e){echo $e->getMessage();}

$pw = $_POST['pw'];
$pw_md5 = $row['passwordUtente'];
$new_pw1 = $_POST['new_pw1'];
$new_pw2 = $_POST['new_pw2'];

if (md5($pw)==$pw_md5){
    if ($new_pw1 == $new_pw2){
        $new_pw_md = md5($new_pw1);
        try{
            $sql = "UPDATE utente
                set passwordUtente = '$new_pw_md'
                where email = '$email';";
            $res = $pdo -> query($sql);

        }catch(PDOException $e){echo $e->getMessage();}
        echo "<script>alert('Password correttamente modificata.')</script>";
        echo "<script>window.open('../myAccount-profilo.php','_self')</script>";
    }else{
        echo "<script>alert('Le due password non coincidono.')</script>";
        echo "<script>window.open('../myAccount-profilo.php','_self')</script>";
    }
}else{
    echo "<script>alert('La password inserita non è corretta.')</script>";
    echo "<script>window.open('../myAccount-profilo.php','_self')</script>";
}

?>