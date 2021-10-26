<?php
require 'pages/connection.php';
global $pdo;

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
		<meta NAME="DC.Subject" CONTENT="Videogiochi VR">
		<meta NAME="DC.Description" CONTENT="Guida e supporto al noleggio di videogiochi VR">
		<meta NAME="DC.Date" CONTENT="2021/08/19">
		<meta NAME="DC.Language" CONTENT="Italiano">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    <link href="css/style.css?ts=<?=time()?>&quot" rel="stylesheet">
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
                <a class="nav-link active" href="#">HOME</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="pages/catalogo.php">CATALOGO</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="pages/saldi.php">SALDI</a>
              </li>
              <li class="nav-item">
                <a class="nav-link login mt-5" href="<?php $page = (isset($_SESSION['EmailUtente'])) ? 'pages/myAccount-profilo.php' : 'pages/login.php'; echo $page; ?>"> <?php $page = (isset($_SESSION['EmailUtente'])) ? 'La tua area personale' : 'Accedi/Registrati'; echo $page; ?> </a>
              </li>
              <?php
              if(!empty($email)){
                echo '<li class="nav-item">
                          <a class="nav-link login border-bottom border-secondary" href="logout.php">Effettua il logout</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link login border-bottom border-secondary" href="logout.php">Visualizza le notifiche</a>
                      </li>';
              }
              ?>
            </ul>
            <?php
            if(!empty($email)){
              echo ' <a class="nav-link user" href="notifiche.php"><i class="far fa-bell"></i></a>
              <a class="nav-link user" href="logout.php"><i class="fas fa-sign-out-alt"></i></a>
              <button type="button" class="btn rounded-circle  text-white user_menu user" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_menu" aria-controls="offcanvas_menu"><i class="fas fa-user text-white"></i></button>
              ';

            }else{
              echo '<a class="nav-link user" href="pages/login.php"><i class="far fa-user"></i></a>';
            }
            ?>
            
          </div>
        </div>
      </nav>
      <?php
      if(!empty($email)){
        echo '<nav class="navbar fixed-bottom navbar-expand navbar-dark" id="bottomNav">
                  <div class="container">
                      <div class="collapse navbar-collapse">
                          <ul class="navbar-nav justify-content-end w-100">
                              <li class="nav-item">
                                  <button type="button" class="btn rounded-circle text-white user_menu user" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_menu" aria-controls="offcanvas_menu"><i class="fas fa-user text-white"></i></button>
                              </li>
                          </ul>
                      </div>
                  </div>
              </nav>';
      }
      ?>
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
      <section id="welcome_home" class="mt-lg-0 pt-5 px-3">
        <div class="container">
          <div class="row pt-5 pt-md-4 pt-lg-3 d-flex justify-content-center">
            <div class="col-md welcome_text">
              <h1 class="mb-lg-4 mb-md-3 mb-2 ">Sperimenta l'inimmaginabile</h1>
              <p class="subtitle mb-lg-4 mb-md-3 mb-2 text-start">Noleggia un videogioco a realtà virtuale e <span class="subtitle_span ms-1"> vivi la tua prossima avventura. </span></p>
              <div class="d-flex">
                <input type="text" class="form-control search_bar" id="searchbar_input" placeholder="Cerca e seleziona..">
              </div>
              <div class="p-3" id="searchbar_result">
              </div>
            </div>
            <div class="col-md d-flex align-items-center welcome_video">
              <video src="media/homeVideo.mp4" autoplay muted loop class="rounded mx-auto d-block img-thumbnail img-fluid"></video><br><br>
            </div>
          </div>
        </div>
      </section>
      <section id="highlight_home" class="px-3 pt-4">
        <div class="container mt-4">
          <h2>Lasciati ispirare</h2>
          <p class="subtitle text-start">Non sai da dove iniziare? Non ti preoccupare, ti aiutiamo noi!</p>
          <div class="responsive">
            <div class="card me-lg-4 me-md-2 me-1">
              <a href="#"><img src="media/42.png" class="bd-placeholder-img card-img-top img-fluid" width="100%" height="225"><div class="centered">Più popolari</div></a>
            </div>
            <div class="card me-lg-4 me-md-2 me-1">
              <a href="#"><img src="media/42.png" class="bd-placeholder-img card-img-top img-fluid" width="100%" height="225"><div class="centered">Più noleggiati</div></a>
            </div>
            <div class="card me-lg-4 me-md-2 me-1">
              <a href="#"><img src="media/42.png" class="bd-placeholder-img card-img-top img-fluid" width="100%" height="225"><div class="centered">Più ricercati</div></a>
            </div>
          </div>
        </div>
        <div class="container mt-5">
          <div class="wrapper me-lg-5 d-flex justify-content-between">
            <h2>Saldi</h2>
            <p class="link mt-3">Vedi tutti</p>
          </div>
          <p class="subtitle text-start">Solo una settimana per noleggiare risparmiando! </p>
          <div class="responsive">
            <div class="card me-lg-4 me-md-2 me-1">
              <a href="#"><img src="media/42.png" class="bd-placeholder-img card-img-top img-fluid" width="100%" height="225"></a>
              <div class="card-body">
                <p class="card-text title">Astro Bot</p>
                <p class="card-text discounted">31.25€ <span class="full">62.50€</span></p>
                <p class="card-text end">Terminerà tra <span id="primaOfferta"></span> </p>
              </div>
            </div>
            <div class="card me-lg-4 me-md-2 me-1">
              <a href="#"><img src="media/42.png" class="bd-placeholder-img card-img-top img-fluid" width="100%" height="225"></a>
              <div class="card-body">
                <p class="card-text title">Beat Saber</p>
                <p class="card-text discounted">31.25€ <span class="full">62.50€</span></p>
                <p class="card-text end">Terminerà tra <span id="terzaOfferta"></span> </p>
              </div>
            </div>
            <div class="card me-lg-4 me-md-2 me-1">
              <a href="#"><img src="media/42.png" class="bd-placeholder-img card-img-top img-fluid" width="100%" height="225"></a>
              <div class="card-body">
                <p class="card-text title">Sniper Elite</p>
                <p class="card-text discounted">31.25€ <span class="full">62.50€</span></p>
                <p class="card-text end">Terminerà tra <span id="quartaOfferta"></span> </p>
              </div>
            </div>
            <div class="card me-lg-4 me-md-2 me-1">
              <a href="#"><img src="media/42.png" class="bd-placeholder-img card-img-top img-fluid" width="100%" height="225"></a>
              <div class="card-body">
                <p class="card-text title">After Life</p>
                <p class="card-text discounted">31.25€ <span class="full">62.50€</span></p>
                <p class="card-text end">Terminerà tra <span id="quintaOfferta"></span> </p>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script type="text/javascript" src="js/slickInit.js"></script>
    <script src="https://kit.fontawesome.com/7ae4aad1cd.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/countdown.js"></script>
    <script type="text/javascript" src="js/ajax-search.js"></script>
  </body>
</html>
