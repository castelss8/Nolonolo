<?php
    require '../connection.php';
    global $pdo;
    $email = $_SESSION['EmailUtente'];

    $newCognome = $_POST['inputCognome'];
    try{
        $sql = "UPDATE utente
                set cognome = '$newCognome'
                where email = '$email';";
        $res = $pdo -> query($sql);

    }catch(PDOException $e){echo $e->getMessage();}
    echo "<script>alert('Cognome correttamente modificato.')</script>";
    echo "<script>window.open('../myAccount-profilo.php','_self')</script>";
?>
