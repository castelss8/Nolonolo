<!doctype html>
<html>
  <head>
    <title>nolonolo/account</title>
    <meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--DUBLINCORE-->
		<meta NAME="DC.Title" CONTENT="nolonolo/account">
		<meta NAME="DC.Creator" CONTENT="Forieri Elena, Castelli Giorgia, Cassanelli Alice">
		<meta NAME="DC.Subject" CONTENT="Profilo personale degli iscritti">
		<meta NAME="DC.Description" CONTENT="Area di salvataggio dei dati personali degli iscritti riservata agli iscritti">
		<meta NAME="DC.Date" CONTENT="2021/08/19">
		<meta NAME="DC.Language" CONTENT="Italiano">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    <link href="style.css" rel="stylesheet">
    <link rel="stylesheet" href="dashboard.css">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

    #myAccount button i{
      color: black;
    }
    #myAccount-accordion h2{
      font-size: 17px;
    }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
  </head>
  <body>
  <?php
    require 'connection.php';
    $email = $_SESSION['EmailUtente'];
    global $pdo;

     try{

         $sql = "SELECT *
                    FROM utente
                    WHERE email = '" . $email . "'";
         $res = $pdo -> query($sql);

     }catch(PDOException $e){echo $e->getMessage();}

            while ($row = $res->fetch()) {
                $username = $row['username'];
                $nome = $row['nome'];
                $cognome = $row['cognome'];
                $email = $row['email'];
                $tipo = $row['tipo'];
                $passwordUtente = $row['passwordUtente'];
                $dataNascita = $row['dataNascita'];
                $dataRegistrazione = $row['dataRegistrazione'];
            }
  ?>
    
<header>
  <nav class="navbar navbar-expand-md navbar-light pb-4" id="topNav">
    <div class="container">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
        <a class="navbar-brand" href="#">NOLONOLO</a>
      <div class="collapse navbar-collapse justify-content-md-center" id="navbarCollapse">
        <a class="closebtn" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">&times;</a>
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown10" data-bs-toggle="dropdown" aria-expanded="false">PRODOTTI</a>
            <ul class="dropdown-menu" aria-labelledby="dropdown10">
              <li><a class="dropdown-item" href="#"><img src="media/navLink2.png" alt=""class="img-fluid"> VIDEOGIOCHI</a></li>
              <li><a class="dropdown-item" href="#"><img src="media/navLink1.png" alt=""class="img-fluid"> VISORI</a></li>
              <li><a class="dropdown-item" href="#"><img src="media/navLink3.png" alt=""class="img-fluid"> STATISTICHE</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">SUPPORTO</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">SALDI</a>
          </li>
        </ul>
      </div>
      <a class="nav-link carrello" href=""><i class="fas fa-shopping-cart carrelloBtn"></i></a>
      <a class="nav-link areaPersonale" href=""><i class="fas fa-user areaPersonaleBtn"></i></a>
    </div>
  </nav>
</header>
<div class="container">
  <div class="row">
    <div class="col-lg-2 mt-lg-4 mt-3 " id="carta-fedelta">
      <div class="wrapper">
        <h5>GENTILE <?php echo $username?></h5>
        <div class="carta p-2" style="background: #d0cad4;">
          <div class="mb-3">
            <h3><span>0</span> punti</h3>
          </div>
          <div class="mb-3">
            <p style="font-size: 10px;">Ti mancano 100 punti per aggiudicarti il prossimo buono sconto.</p>
          </div>
          <button type="submit" class="w-100 p-2 d-flex justify-content-between align-items-center" style="border: 1px solid black; background: #d0cad4; color: #1e1e1e; font-weight: bold;"data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="fas fa-barcode" style="font-size: 40px;"></i> VISUALIZZA LA TUA CARTA FEDELT??
          </button>
        </div>
      </div>
      
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">La  tua carta</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="carta-fidelity" style="position:relative; text-align: center;">
              <img src="2.png" alt="" class="rounded-3 card-img-top">
              <p style="font-family: 'Libre Barcode 39 Text', cursive; position:absolute; top: 50%; left:50%; 
              transform: translate(-50%, -50%); font-size: 50px; color: #c2c2c2;">57658595</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <nav id="sidebarMenu" class="col-md-3 col-lg-3 d-md-block sidebar collapse ms-5">
      <div class="position-sticky" id="side-menu">
       
        <ul class="nav flex-column mt-4">
          <li class="nav-item mb-2">
            <a class="nav-link active" aria-current="page">
              <i class="fas fa-user me-2"></i>
              Profilo
            </a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link" href="myAccount-ordini.php">
              <i class="fas fa-shopping-basket me-2"></i>
              Ordini
            </a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link" href="myAccount-indirizzi.php">
              <i class="fas fa-map-pin me-2"></i>
              Indirizzi
            </a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link" href="myAccount-pagamento.php">
              <i class="fab fa-cc-visa me-2"></i>
              Metodi di pagamento
            </a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link" href="myAccount-coupon.php">
              <i class="fas fa-percentage me-2"></i>
              Coupon
            </a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link" href="#">
              <i class="fas fa-heart me-2"></i>
              Lista dei desideri
            </a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link" href="myAccount-notifiche.php">
              <i class="fas fa-bell me-2"></i>
              Notifiche
            </a>
          </li>
          
          <li class="nav-item mb-2">
            <a class="nav-link" href="logout.php">
              <i class="fas fa-sign-out-alt me-2"></i>
              Logout
            </a>
          </li>
        </ul>
      </div>
    </nav>


    <main class="col-md-8 ms-sm-auto col-lg-9 px-md-4">
      
      <div class="myAccount-mobile-menu mt-5 mt-lg-0" id="myAccount-mobile-menu">
        
          <div class="dropdown d-flex align-items-center justify-content-center" style="width: 100%;">
            <button class="btn btn-secondary dropdown-toggle btn-lg d-flex justify-content-between align-items-center" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="width: 100%; background: #1e1e1e; border-radius: 30px;">
              <span><i class="fas fa-user me-2"></i> Il tuo profilo</span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="
              max-height: 150px;
              overflow-y: auto;
              width: 100%;
              background: #1e1e1e;
          ">
              <li><a class="dropdown-item" href="myAccount-ordini.php"><i class="fas fa-shopping-basket me-2"></i> Ordini</a></li>
              <li><a class="dropdown-item" href="myAccount-indirizzi.php"><i class="fas fa-map-pin me-2"></i> Indirizzi</a></li>
              <li><a class="dropdown-item" href="myAccount-pagamento.php"> <i class="fab fa-cc-visa me-2"></i> Metodi di pagamento</a></li>
              <li><a class="dropdown-item" href="myAccount-coupon.php"><i class="fas fa-percentage me-2"></i> Coupon</a></li>
              <li><a class="dropdown-item" href="#"><i class="fas fa-heart me-2"></i> Lista dei desideri</a></li>
              <li><a class="dropdown-item" href="myAccount-notifiche.php"><i class="fas fa-bell me-2"></i> Notifiche</a></li>
              <li><a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt me-2"></i> Logout</a></li>
            </ul>
          </div>
      </div>
      
      <div class="container p-2" id="myAccount">
        
       <div class="row mb-2 row-cols-1 row-cols-lg-1 g-4 py-5 py-lg-5">
         
        <h2>I tuoi dati personali</h2>
          <div class="col-md">
            <div class="row">
              <div class="col">
                
              
                <div class="accordion accordion-flush" id="myAccount-accordion">
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                      Nome
                      <button class="accordion-button collapsed mt-1" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        <?php echo $nome?>
                      </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                      <div class="accordion-body mb-3">
                        <form action="myAccountForm/cambiaNome.php" method="post">
                          <div class="row g-3 align-items-center">
                            <div class="col-auto">
                              <label for="labelForInputCognome" class="col-form-label">Digita il tuo nuovo nome: </label>
                            </div>
                            <div class="col-auto">
                              <input type="text" id="inputNome" name="inputNome" class="form-control">
                            </div>
                            <div class="col-auto">
                              <button type="submit" class="formBtn">Conferma</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item mt-3">
                    <h2 class="accordion-header" id="flush-headingOneB">
                      Cognome
                      <button class="accordion-button collapsed mt-1" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOneB" aria-expanded="false" aria-controls="flush-collapseOneB">
                          <?php echo $cognome?>
                      </button>
                    </h2>
                    <div id="flush-collapseOneB" class="accordion-collapse collapse" aria-labelledby="flush-headingOneB" data-bs-parent="#accordionFlushExample">
                      <div class="accordion-body mb-3">
                        <form action="myAccountForm/cambiaCognome.php" method="post">
                          <div class="row g-3 align-items-center">
                            <div class="col-auto">
                              <label for="labelForInputCognome" class="col-form-label">Digita il tuo nuovo cognome:</label>
                            </div>
                            <div class="col-auto">
                              <input type="text" id="inputCognome" name="inputCognome" class="form-control" placeholder="Rossi">
                            </div>
                            <div class="col-auto">
                              <button type="submit" class="formBtn">Conferma</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item mt-3">
                    <h2 class="accordion-header" id="flush-headingThree">
                      Data di nascita
                      <button class="accordion-button collapsed mt-1" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                          <?php echo date('d-m-Y', strtotime($dataNascita));
                          ?>
                      </button>
                    </h2>
                    <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                      <div class="accordion-body mb-3">
                        <form action="myAccountForm/cambiaData.php" method="post">
                          <div class="row g-3 align-items-center">
                            <div class="col-auto">
                              <label for="labelForInputCognome" class="col-form-label">Seleziona la tua data di nascita:</label>
                            </div>
                            <div class="col-auto">
                              <input type="date" id="inputData" name="inputData" class="form-control">
                            </div>
                            <div class="col-auto">
                              <button type="submit" class="formBtn">Conferma</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item mt-3">
                    <h2 class="accordion-header" id="flush-headingTwo">
                      Email
                      <button class="accordion-button collapsed mt-1" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                          <?php echo $email?>
                      </button>
                    </h2>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                      <div class="accordion-body mb-3">
                        <form action="myAccountForm/cambiaEmail.php" method="post">
                          <div class="row g-3 align-items-center">
                            <div class="col-auto">
                              <label for="labelForInputCognome" class="col-form-label">Digita la tua nuova e-mail:</label>
                            </div>
                            <div class="col-auto">
                              <input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="n.c@esempio.it" aria-describedby="emailHelp">
                            </div>
                            <div class="col-auto">
                              <button type="submit"class="formBtn">Conferma</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  
                  <div class="accordion-item mt-3">
                    <h2 class="accordion-header" id="flush-headingFour">
                      Username
                      <button class="accordion-button collapsed mt-1" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                          <?php echo $username?>
                      </button>
                    </h2>
                    <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                      <div class="accordion-body mb-3">
                        <form action="myAccountForm/cambiaUser.php" method="post">
                          <div class="row g-3 align-items-center">
                            <div class="col-auto">
                              <label for="labelForInputCognome" class="col-form-label">Digita il tuo nuovo username:</label>
                            </div>
                            <div class="col-auto">
                              <input type="text" id="inputUsername" name="inputUsername" class="form-control" placeholder="pippi">
                            </div>
                            <div class="col-auto">
                              <button type="submit" class="formBtn">Conferma</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item mt-3">
                    <h2 class="accordion-header" id="flush-headingFive">
                      Password
                      <button class="accordion-button collapsed mt-1" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                          *********
                      </button>
                    </h2>
                    <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
                      <div class="accordion-body mb-3">
                        <form action="myAccountForm/cambiaPw.php" method="post">

                          <div class="mb-3">
                            <div class="mb-3">
                              <label for="exampleInputPassword1" class="form-label">Inserisci la vecchia password</label>
                              <input type="password" class="form-control" id="exampleInputPassword1" name="pw">
                            </div>
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Inserisci la nuova password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="new_pw1">
                            <span id="help" class="form-text">La password deve contenere almeno 5 caratteri alfanumerici.</span>
                          </div>
                          
                          <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Conferma la nuova password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="new_pw2">
                            <span id="help" class="form-text">Questa password deve coincidere con la precedente.</span>
                          </div>
                          <button type="submit" class="formBtn">Conferma</button>
                        </form>
                    </div>
                    </div>
                  </div>
                </div>
              </div>
              </div>
              
            </div>
          </div>
          
          
      </div>
    </main>
  </div>
</div>

<script src="https://kit.fontawesome.com/7ae4aad1cd.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>
