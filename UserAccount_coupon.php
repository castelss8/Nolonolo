<?php
require 'connection.php';
global $pdo;
$_SESSION['emailUtente'] = "giorgia.castelli@libero.it";
$email=$_SESSION['emailUtente'];
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
		<meta NAME="DC.Title" CONTENT="nolonolo/catalogo">
		<meta NAME="DC.Subject" CONTENT="Videogiochi VR">
		<meta NAME="DC.Description" CONTENT="Lista dei videogiochi accessibili">
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
                    <a class="nav-link" href="../../index.php">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../catalogo.php">CATALOGO</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../saldi.php">SALDI</a>
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
    <main>
        <section id="catalogue"  class="pt-5 px-3">
          <div class="container">
          <h2 class="mt-5 text-white">I tuoi coupon</h2>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 pt-3">
            <?php
            $today = date ("Y/m/d");
                try{
                    $q="SELECT * FROM coupon WHERE scadenza >= '$today' AND codice IN (SELECT codice FROM couponassegnati WHERE email='$email' AND stato = 'Disponibile')";
                    $run= $pdo -> query($q);
                }catch(PDOException $e){
                    die($q . "<br>" . $e->getMessage());
                }
                if($run->rowCount()>0){
                    while($row = $run->fetch()) {
                        echo '<div class="col d-flex justify-content-center">
                        <div class="card shadow">
                                <svg class="bd-placeholder-img card-img-top" width="100%" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="white"/><text x="50%" y="50%" fill="red" dy=".3em">-'. $row['valore'] .'%</text></svg>
                                <div class="card-body codice text-center text-dark border-top border-secondary">
                                    <span> COD. ' . $row['codice'] . '</span>
                                </div>
                            </div>
                            </div>';
                    }
                }else{
                  echo '<h3 class="text-center text-secondary w-100"> Al momento non ti è stato assegnato nessun coupon :( <br> Visita il <a href="../catalogo.php" class="text-secondary"> nostro catalogo</a> e noleggia un videogioco! Più noleggi, più risparmi!</h3>';
                }
            ?>
          </div>
        </div>
      </section>
    </main>
    <script src="https://kit.fontawesome.com/7ae4aad1cd.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>