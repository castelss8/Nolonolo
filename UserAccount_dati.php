<?php
require 'connection.php';
global $pdo;

$email=$_SESSION['emailUtente'];
try{
    $sql = "SELECT * FROM utente WHERE email = '$email'";
    $res = $pdo -> query($sql);
}catch(PDOException $e){
    echo $e->getMessage();
}
while ($row = $res->fetch()) {
    $username = $row['username'];
    $nome = $row['nome'];
    $cognome = $row['cognome'];
    $passwordUtente = $row['passwordUtente'];
    $dataNascita = $row['dataNascita'];
}

try{
    $q="SELECT stato FROM cliente WHERE email = '$email'";
    $run= $pdo -> query($q);
}catch(PDOException $e){
    die($q . "<br>" . $e->getMessage());
}
if($run->rowCount()>0){
    while($row = $run->fetch()) {
        $user_type = $row['stato'];
    }
}

?>
<!doctype html>
<html>
    <head>
        <title>nolonolo</title>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta NAME="DC.Title" CONTENT="nolonolo">
        <meta NAME="DC.Subject" CONTENT="Profilo personale degli iscritti">
        <meta NAME="DC.Description" CONTENT="Area di salvataggio dei dati personali degli iscritti riservata agli iscritti">
        <meta NAME="DC.Date" CONTENT="2021/08/19">
        <meta NAME="DC.Language" CONTENT="Italiano">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="../css/style.css" rel="stylesheet">
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-sm p-2 fixed-top" id="topNav">
                <div class="container">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a class="navbar-brand" href="#">nolonolo</a>
                    <div class="collapse navbar-collapse ps-4 pe-4 pe-md-0 pt-md-0 w-100 h-100 top-0" id="navbarCollapse">
                        <a class="closebtn" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">&times;</a>
                        <ul class="navbar-nav me-auto mb-2 mb-md-0 py-4 px-2 py-sm-0 py-sm-0">
                            <li class="nav-item">
                                <a class="nav-link" href="../index.php">HOME</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="catalogo.php">CATALOGO</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="saldi.php">SALDI</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link login mt-5 border-bottom border-secondary" href="#">La tua area personale <i class="fas fa-chevron-right float-end"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link login border-bottom border-secondary" href="logout.php">Effettua il logout</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link login border-bottom border-secondary" href="logout.php">Visualizza le notifiche</a>
                            </li>
                        </ul>
                        <a class="nav-link user" href="notifiche.php"><i class="far fa-bell"></i></a>
                        <a class="nav-link user" href="logout.php"><i class="fas fa-sign-out-alt"></i></a>
                        <button type="button" class="btn rounded-circle  text-white user_menu user" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_menu" aria-controls="offcanvas_menu"><i class="fas fa-user text-white"></i></button>
                    </div>
                </div>
            </nav>
            <nav class="navbar fixed-bottom navbar-expand navbar-dark" id="bottomNav">
                <div class="container">
                    <div class="collapse navbar-collapse">
                        <ul class="navbar-nav justify-content-end w-100">
                            <li class="nav-item">
                                <button type="button" class="btn rounded-circle text-white user_menu user" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_menu" aria-controls="offcanvas_menu"><i class="fas fa-user text-white"></i></button>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvas_menu" aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header mt-2 d-flex justify-content-end">
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div class="wrapper px-lg-5 ">
                    <div class="carta border rounded border-secondary p-3">
                        <div class="mb-3 d-flex justify-content-between align-items-center">
                            <h4 class="text-white">
                            <?php
                            try{
                                $q="SELECT * FROM cartafedelta WHERE email = '$email'";
                                $run= $pdo -> query($q);
                            }catch(PDOException $e){
                                die($q . "<br>" . $e->getMessage());
                            }
                            while($row = $run->fetch()) {
                                $cod = $row['codice'];
                                $points = $row['punti'];
                            }
                            echo $points;
                            ?> punti</h4> 
                            <h4 class="text-white"><span class="level"><?php echo $user_type ?></span></h4> <!--SERVE UN TRIGGER CHE CAMBIA LO STATO DELL'UTENTE IN BASE AI PUNTI-->
                        </div>
                        <div class="mb-3">
                            <h6 class="barcode text-center"><?php echo $cod ?></h6>
                        </div>
                        <div class="mb-3">
                            <h6 class="text-white text-center info">
                            <?php 
                            if($points<250){
                                $diff = 250 - $points;
                                echo 'Ti mancano ';
                                echo $diff;
                                echo' punti per diventare un livello PRO!';
                            }elseif($points>=250 && $points<500){
                                $diff = 500 - $points;
                                echo 'Ti mancano ';
                                echo $diff;
                                echo' punti per diventare un livello GENIUS!';
                            }else{
                                echo 'Complimenti, hai raggiunto il livello massimo, sei un GENIUS!';
                            }
                            ?> </h6>
                        </div>
                    </div>
                </div>
                <ul class="navbar-nav p-3 mt-5" id="sidebar">
                    <li class="side-item pb-2 border-bottom">
                        <a class="side-link active text-decoration-none" href="#">Dati</a>
                    </li>
                    <li class="side-item pb-2 pt-2 border-bottom">
                        <a class="side-link text-decoration-none" href="UserAccount_ordini.php">Ordini</a>
                    </li>
                    <li class="side-item pb-2 pt-2 border-bottom">
                        <a class="side-link text-decoration-none" href="UserAccount_coupon.php">Coupon</a>
                    </li>
                    <li class="side-item pb-2 pt-2 border-bottom">
                        <a class="side-link text-decoration-none" href="UserAccount_preferiti.php">Preferiti</a>
                    </li>
                </ul>
            </div>
        </div>
        <main class="container pt-5">
            <div class="row py-lg-5">
                <div class="col-md-8 p-5 px-lg-5">
                    <h2 class="text-white">I tuoi dati personali</h2>
                    <div class="accordion accordion-flush pt-4" id="myAccount-accordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne">Nome<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne"> <?php echo $nome?></button></h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <form action="myAccountForm/cambiaNome.php" method="post">
                                        <div class="row g-3 align-items-center">
                                            <div class="col-auto">
                                                <label for="labelForInputCognome" class="text-white">Correggi il tuo nome: </label>
                                            </div>
                                            <div class="col-auto">
                                                <input type="text" id="inputNome" name="inputNome" class="form-control">
                                            </div>
                                            <div class="col-auto">
                                                <button type="submit" class="btn btn-primary text-white">Cambia</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="accordion-item mt-3">
                            <h2 class="accordion-header" id="flush-headingOneB">Cognome<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOneB" aria-expanded="false" aria-controls="flush-collapseOneB"><?php echo $cognome?></button></h2>
                            <div id="flush-collapseOneB" class="accordion-collapse collapse" aria-labelledby="flush-headingOneB" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <form action="myAccountForm/cambiaCognome.php" method="post">
                                        <div class="row g-3 align-items-center">
                                            <div class="col-auto">
                                                <label for="labelForInputCognome"  class="text-white">Correggi il tuo cognome:</label>
                                            </div>
                                            <div class="col-auto">
                                                <input type="text" id="inputCognome" name="inputCognome" class="form-control" placeholder="Rossi">
                                            </div>
                                            <div class="col-auto">
                                                <button type="submit" class="btn btn-primary text-white">Cambia</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="accordion-item mt-3">
                            <h2 class="accordion-header" id="flush-headingThree">Data di nascita<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree"><?php echo date('d-m-Y', strtotime($dataNascita));?></button></h2>
                            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <form action="myAccountForm/cambiaData.php" method="post">
                                        <div class="row g-3 align-items-center">
                                            <div class="col-auto">
                                                <label for="labelForInputCognome"  class="text-white">Correggi la tua data di nascita:</label>
                                            </div>
                                            <div class="col-auto">
                                                <input type="date" id="inputData" name="inputData" class="form-control">
                                            </div>
                                            <div class="col-auto">
                                                <button type="submit" class="btn btn-primary text-white">Cambia</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>  
                        <hr>   
                        <div class="accordion-item mt-3">
                            <h2 class="accordion-header" id="flush-headingFour">Username<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour"><?php echo $username?></button></h2>
                            <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <form action="myAccountForm/cambiaUser.php" method="post">
                                        <div class="row g-3 align-items-center">
                                            <div class="col-auto">
                                                <label for="labelForInputCognome"  class="text-white">Cambia username:</label>
                                            </div>
                                            <div class="col-auto">
                                                <input type="text" id="inputUsername" name="inputUsername" class="form-control" placeholder="pippi">
                                            </div>
                                            <div class="col-auto">
                                                <button type="submit" class="btn btn-primary text-white">Cambia</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="accordion-item mt-3">
                            <h2 class="accordion-header" id="flush-headingFive">Password<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">*********</button></h2>
                            <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <form action="myAccountForm/cambiaPw.php" method="post">
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label text-white">Inserisci la vecchia password</label>
                                            <input type="password" class="form-control" id="exampleInputPassword1" name="pw">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label text-white">Inserisci la nuova password</label>
                                            <input type="password" class="form-control" id="exampleInputPassword1" name="new_pw1">
                                            <span id="help" class="form-text">La password deve contenere almeno 5 caratteri alfanumerici.</span>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label text-white">Conferma la nuova password</label>
                                            <input type="password" class="form-control" id="exampleInputPassword1" name="new_pw2">
                                            <span id="help" class="form-text">Questa password deve coincidere con la precedente.</span>
                                        </div>
                                        <button type="submit" class="btn btn-primary text-white">Cambia</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <script src="https://kit.fontawesome.com/7ae4aad1cd.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>