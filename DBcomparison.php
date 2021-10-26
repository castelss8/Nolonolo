<?php
require 'connection.php';
global $pdo;
try{
    if($_POST['query']){
        $q = "SELECT * FROM videogame WHERE nome LIKE '{$_POST['query']}%' LIMIT 3";
        $run = $pdo -> query($q);
        if($run->rowCount() > 0){
            while($row = $run->fetch()){
                echo "<a href='pages/videogioco.php?id=". $row['id'] . "' class='text-white'>" . $row["nome"] . "</a><br>";
            }
        } else{
            echo "<p class='text-white'>Nessun risultato.</p>";
        }
    }  
} catch(PDOException $e){
    die($q . "<br>" . $e->getMessage());
}
?>
