<!doctype html>
<html>
<head>
    <title>nolonolo</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--DUBLINCORE-->
    <meta NAME="DC.Title" CONTENT="nolonolo">
    <meta NAME="DC.Creator" CONTENT="Forieri Elena, Castelli Giorgia, Cassanelli Alice">
    <meta NAME="DC.Subject" CONTENT="Videogiochi ed attrezzatura VR">
    <meta NAME="DC.Description" CONTENT="Guida e supporto al noleggio di videogiochi ed attrezzatura VR">
    <meta NAME="DC.Date" CONTENT="2021/08/19">
    <meta NAME="DC.Language" CONTENT="Italiano">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    <link href="../css/style.css" rel="stylesheet">
</head>

<body>
<?php
    require 'connection.php';
    global $pdo;
    if(isset($_POST['submit'])){

        $nomeUtente = $_POST['nome'];
        $cognomeUtente = $_POST['cognome'];
        $username = $_POST['username'];
        $emailUtente = $_POST['email'];
        $passwordUtente = $_POST['passwordUtente'];
        $passwordUtente = md5($passwordUtente);
        $dataNascitaUtente = $_POST['dataNascita'];
        $tipoUtente = "Cliente";
        try {
            $sql = $pdo->prepare("INSERT INTO Utente VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $sql->bindParam(1, $username, PDO::PARAM_STR);
            $sql->bindParam(2, $nomeUtente, PDO::PARAM_STR);
            $sql->bindParam(3, $cognomeUtente, PDO::PARAM_STR);
            $sql->bindParam(4, $emailUtente, PDO::PARAM_STR);
            $sql->bindParam(5, $tipoUtente, PDO::PARAM_STR);
            $sql->bindParam(6, $passwordUtente, PDO::PARAM_STR);
            $sql->bindParam(7, $dataNascitaUtente, PDO::PARAM_STR);
            $date = date('Y-m-d H:i:s');
            $sql->bindParam(8, $date, PDO::PARAM_STR);
            $res = $sql->execute();
        }catch(PDOException $e) {
            echo("Query SQL Failed: ".$e->getMessage());
            exit();
        }

        try {
            $sql = $pdo->prepare("INSERT INTO cartafedelta(emissione, email) VALUES (?, ?)");
            $sql->bindParam(1, $date, PDO::PARAM_STR);
            $sql->bindParam(2, $emailUtente, PDO::PARAM_STR);
            $res = $sql->execute();
        }catch(PDOException $e) {
            echo("Query SQL Failed: ".$e->getMessage());
            exit();
        }

        if ($res>0){
            echo "<script> window.alert('Richiesta processata correttamente!'); window.location.href='login.php'; </script>";
        } else {
            echo "<script> window.alert('NO'); window.location.href='registrazione.php'; </script>";
        }



        /*if($res > 0){
            try {
                $sql = $pdo->prepare("INSERT INTO Cliente VALUE (?)");
                $sql->bindParam(1, $emailUtente, PDO::PARAM_STR);
                $res = $sql->execute();
            }catch(PDOException $e) {
                echo("Query SQL Failed: ".$e->getMessage());
                exit();
            }

            if($res > 0){
                echo "<script> window.alert('Richiesta processata correttamente!'); window.location.href='login.php'; </script>";
            }else
                echo "<script> alert('La richiesta NON è stata processata correttamente!'); window.location.href='registrazione.php'; </script>";
            }*/
    }


?>
<section id="quarta" style="background: #1e1e1e;">
    <div class="container">
        <h2>Registrazione</h2>
        <div class="card-body">
            <form method="post" action="registrazione.php">

                <div class="form-group input-group">
                    <input type="text" placeholder="Inserisci il tuo nome" class="form-control" name="nome" required>
                </div>

                <div class="form-group input-group">
                    <input type="text" placeholder="Inserisci il tuo cognome" class="form-control" name="cognome" required>
                </div>

                <div class="form-group input-group">
                    <input type="text" placeholder="Inserisci il tuo username" class="form-control" name="username" required>
                </div>

                <div class="form-group input-group">
                    <input type="email" placeholder="Inserisci il tuo indirizzo E-mail" class="form-control" name="email" required>
                </div>

                <div class="form-group input-group">
                    <input type="password" placeholder="Inserisci la tua password" class="form-control" name="passwordUtente" minlength="6"  required>
                </div>

                <div class="form-group input-group">
                    <input type="date" placeholder="Inserisci la tua data di nascita" class="form-control" name="dataNascita" required>
                </div>
<!---->
<!--                <div class="form-group input-group">-->
<!--                    <input type="text" placeholder="Inserisci il tuo luogo di nascita" class="form-control" name="luogoNascita" required>-->
<!--                </div>-->
<!---->
<!--                <div class="form-group input-group">-->
<!--                    <input type="text" placeholder="Inserisci il tuo numero di telefono" class="form-control" name="recapito" required>-->
<!--                </div>-->

                <div class="form-group">
                    <button type="submit" name='submit' id='submit' class="btn btn-primary btn-block"> Crea account  </button>
                </div>
                <p class="text-center">Hai già un account? <a href="login.php">Accedi!</a> </p>

            </form>
        </div>
    </div>
</section>


</body>

</html>