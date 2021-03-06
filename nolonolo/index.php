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
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/dashboard.css">
  </head>
  <body>
  <?php
      require 'pages/connection.php';
      global $pdo;
      //echo $_SESSION['EmailUtente'];
      //echo $_SESSION['EmailUtente'];
  ?>
    <header>
      <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-arrow-up"></i></button>
      <nav class="navbar navbar-expand-md navbar-light" id="topNav">
        <div class="container">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
            <a class="navbar-brand" href="#">NOLONOLO</a>
          <div class="collapse navbar-collapse justify-content-md-center ps-4 pe-4 pt-5 ps-md-0  pe-md-0 pt-md-0 w-100 h-100 top-0" id="navbarCollapse">
            <a class="closebtn" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">&times;</a>
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle border-bottom pb-3 pb-lg-0" href="#" id="dropdown10" data-bs-toggle="dropdown" aria-expanded="false">PRODOTTI</a>
                <ul class="dropdown-menu" aria-labelledby="dropdown10">
                  <li><a class="dropdown-item" href="#"><img src="media/navLink2.png" alt=""class="img-fluid"> VIDEOGIOCHI</a></li>
                  <li><a class="dropdown-item" href="#"><img src="media/navLink1.png" alt=""class="img-fluid"> VISORI</a></li>
                  <li><a class="dropdown-item" href="#"><img src="media/navLink3.png" alt=""class="img-fluid"> STATISTICHE</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link border-bottom pb-3 pb-lg-0" href="#">SUPPORTO</a>
              </li>
              <li class="nav-item">
                <a class="nav-link border-bottom pb-3 pb-lg-0" href="#">SALDI</a>
              </li>
            </ul>
          </div>
          <a class="nav-link carrello" href=""><i class="fas fa-shopping-cart carrelloBtn"></i></a>
          <a class="nav-link areaPersonale" href="myAccount-profilo.html"><i class="fas fa-user areaPersonaleBtn"></i></a>
        </div>
      </nav>

      <nav class="navbar fixed-bottom navbar-expand navbar-dark" id="bottomNav">
        <div class="container">
          <div class="collapse navbar-collapse">
            <ul class="navbar-nav justify-content-between w-100">
              <li class="nav-item">
                <a class="nav-link border shadow-sm navLink" aria-current="page" href="#"><i class="fas fa-feather-alt"></i></a>
              </li>
              <li class="nav-item">
                <a class="nav-link  border shadow-sm navLink" href="#"><i class="fas fa-fire"></i></a>
              </li>
              <li class="nav-item">
                <a class="nav-link  border shadow-smactive rounded-pill link-centrale" href="#topNav"><i class="fas fa-eye"></i></a>
              </li>
              <li class="nav-item">
                <a class="nav-link  border shadow-sm navLink" href="#"><i class="fas fa-shopping-cart"></i></a>
              </li>
              <li class="nav-item">
                <a class="nav-link  border shadow-sm link-areaP rounded-circle"
                   href="<?php $page = (isset($_SESSION['EmailUtente'])) ? 'pages/myAccount-profilo.php' : 'pages/login.php'; echo $page; ?>"><i class="fas fa-user"></i></a> <!--se ?? gia loggato vai in profilo.html se no vai a login.php-->
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <main>
      <section id="primaMobile">
        <div class="container-fluid h-100">
          <div class="row">
            <div class="col" >
              <h2 class="titolo">SPERIMENTA L'INIMMAGINABILE</h2>
            </div>
          </div>
          <div class="row h-40">
            <div class="col">
              <img src="media/homeVisor.png" alt="" class="img-fluid">
            </div>
          </div>
        </div>
      </section>
      <section id="primaLaptop">
        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="container h-100">
                <div class="row h-100 justify-content-center align-items-center">
                  <div class="col">
                    <h2 class="primoTitolo">SPERIMENTA L'INIMMAGINABILE</h2>
                    <img src="media/homeVisor.png" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="container h-100">
                <div class="row h-100 justify-content-center align-items-center">
                  <div class="col-md-7">
                    <h2 class="secondoTitolo">Tutto ?? possibile</h2>
                    <blockquote>I videogiochi in realt?? virtuale ridefiniscono l'avventura, ridefiniscono l'esperienza umana, ridefiniscono qualsiasi cosa.</blockquote>
                    <p><a href="recensioni.html" class="link">Chiedilo ai nostri clienti <i class="fas fa-arrow-right"></i></a></p>
                  </div>
                  <div class="col-md-5">
                    <video src="media/homeVideo.mp4" autoplay muted loop></video><br><br>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </section>
      <section id="seconda" class="pt-3">
        <div class="container h-100 ">
          <div class="row h-100 justify-content-center align-items-center">
            <div class="col-lg">
              <h2>Tutto ?? possibile</h2>
              <blockquote>I videogiochi in realt?? virtuale ridefiniscono l'avventura, ridefiniscono l'esperienza umana, ridefiniscono qualsiasi cosa.</blockquote>
            </div>
            <div class="col-lg">
              <video src="media/homeVideo.mp4" autoplay muted loop class="h-100 w-100"></video><br><br>
              <p><a href="">Chiedilo ai nostri clienti <i class="fas fa-arrow-right"></i></a></p>
            </div>
          </div>
        </div>
      </section>
      <section id="quarta" style="background: #1e1e1e;" class="p-2 p-lg-5">
        <div class="container mt-4">
          <h2>Statistiche</h2>
          <div class="responsive">
            <div class="card me-lg-4">
              <a href="#"><img src="media/6.png" class="bd-placeholder-img card-img-top img-fluid" width="100%" height="225"><div class="testoCentrato">I pi?? venduti</div></a>
            </div>
            <div class="card me-lg-4">
              <a href="#"><img src="media/7.png" class="bd-placeholder-img card-img-top img-fluid" width="100%" height="225"><div class="testoCentrato">I pi?? popolari</div></a>
            </div>
            <div class="card">
              <a href="#"><img src="media/8.png" class="bd-placeholder-img card-img-top img-fluid" width="100%" height="225"><div class="testoCentrato">Le new entries</div></a>
            </div>
          </div>
        </div>
        <div class="container mt-4">
          <h2>Categorie</h2>
          <div class="responsive">
            <div class="card me-lg-4">
              <a href="#"><img src="media/10.png" class="bd-placeholder-img card-img-top img-fluid" width="100%" height="225"><div class="testoCentrato">Sport</div></a>
            </div>
            <div class="card me-lg-4">
              <a href="#"><img src="media/11.png" class="bd-placeholder-img card-img-top img-fluid" width="100%" height="225"><div class="testoCentrato">Avventura</div></a>
            </div>
            <div class="card">
              <a href="#"><img src="media/12.png" class="bd-placeholder-img card-img-top img-fluid" width="100%" height="225"><div class="testoCentrato">Musica</div></a>
            </div>
          </div>
        </div>
        <div class="container mt-4">
          <h2>Offerte a tempo limitato</h2>
          <div class="responsive">
            <div class="card me-lg-4">
              <a href="#"><img src="media/1.png" class="bd-placeholder-img card-img-top img-fluid" width="100%" height="225"></a>
              <div class="card-body">
                <p class="card-text nomeGioco">Astro Bot</p>
                <p class="card-text prezzoScontato">31.25??? <span class="prezzoIntero">62.50???</span></p>
                <p class="card-text termine">Terminer?? tra <span id="primaOfferta"></span> </p>
              </div>
            </div>
            <div class="card me-lg-4">
              <a href="#"><img src="media/2.png" class="bd-placeholder-img card-img-top img-fluid" width="100%" height="225"></a>
              <div class="card-body">
                <p class="card-text nomeGioco">Iron Man</p>
                <p class="card-text prezzoScontato">31.25??? <span class="prezzoIntero">62.50???</span></p>
                <p class="card-text termine">Terminer?? tra <span id="secondaOfferta"></span> </p>
              </div>
            </div>
            <div class="card me-lg-4">
              <a href="#"><img src="media/3.png" class="bd-placeholder-img card-img-top img-fluid" width="100%" height="225"></a>
              <div class="card-body">
                <p class="card-text nomeGioco">Beat Saber</p>
                <p class="card-text prezzoScontato">31.25??? <span class="prezzoIntero">62.50???</span></p>
                <p class="card-text termine">Terminer?? tra <span id="terzaOfferta"></span> </p>
              </div>
            </div>
            <div class="card me-lg-4">
              <a href="#"><img src="media/4.png" class="bd-placeholder-img card-img-top img-fluid" width="100%" height="225"></a>
              <div class="card-body">
                <p class="card-text nomeGioco">Sniper Elite</p>
                <p class="card-text prezzoScontato">31.25??? <span class="prezzoIntero">62.50???</span></p>
                <p class="card-text termine">Terminer?? tra <span id="quartaOfferta"></span> </p>
              </div>
            </div>
            <div class="card me-lg-4">
              <a href="#"><img src="media/5.png" class="bd-placeholder-img card-img-top img-fluid" width="100%" height="225"></a>
              <div class="card-body">
                <p class="card-text nomeGioco">After Life</p>
                <p class="card-text prezzoScontato">31.25??? <span class="prezzoIntero">62.50???</span></p>
                <p class="card-text termine">Terminer?? tra <span id="quintaOfferta"></span> </p>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script type="text/javascript" src="js/slickInit.js"></script>
    <script src="https://kit.fontawesome.com/7ae4aad1cd.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/countdown.js"></script>
    <script type="text/javascript" src="js/topScroll.js"></script>
  </body>
</html>
