<!doctype html>
<html>
  <head>
    <title>nolonolo/account/coupon</title>
    <meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--DUBLINCORE-->
		<meta NAME="DC.Title" CONTENT="nolonolo/coupon">
		<meta NAME="DC.Creator" CONTENT="Forieri Elena, Castelli Giorgia, Cassanelli Alice">
		<meta NAME="DC.Subject" CONTENT="Coupon per gli iscritti">
		<meta NAME="DC.Description" CONTENT="Descrizione dei buoni sconto riservati agli iscritti">
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
    
<header>
  <nav class="navbar navbar-expand-md navbar-light pb-4" id="topNav">
    <div class="container">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
        <a class="navbar-brand" href="../index.php">NOLONOLO</a>
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
        <h5>GENTILE Member</h5>
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
      <div class="position-sticky">
       
        <ul class="nav flex-column mt-4">
          <li class="nav-item mb-2">
            <a class="nav-link" href="myAccount-profilo.php">
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
            <a class="nav-link active" aria-current="page">
              <i class="fas fa-percentage me-2"></i>
              Coupon
            </a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link" href="myAccount-desideri.php">
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
            <a class="nav-link" href="#">
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
              <span><i class="fas fa-percentage me-2"></i> I tuoi coupon</span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="
              max-height: 150px;
              overflow-y: auto;
              width: 100%;
              background: #1e1e1e;
          ">
          <li><a class="dropdown-item" href="myAccount-profilo.php"><i class="fas fa-user me-2"></i> Profilo</a></li>
              <li><a class="dropdown-item" href="myAccount-ordini.php"><i class="fas fa-shopping-basket me-2"></i> Ordini</a></li>
              <li><a class="dropdown-item" href="myAccount-indirizzi.php"><i class="fas fa-map-pin me-2"></i> Indirizzi</a></li>
              <li><a class="dropdown-item" href="myAccount-pagamento.php"> <i class="fab fa-cc-visa me-2"></i> Metodi di pagamento</a></li>
              <li><a class="dropdown-item" href="myAccount-desideri.php"><i class="fas fa-heart me-2"></i> Lista dei desideri</a></li>
              <li><a class="dropdown-item" href="myAccount-notifiche.php"><i class="fas fa-bell me-2"></i> Notifiche</a></li>
              <li><a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt me-2"></i> Logout</a></li>
            </ul>
          </div>
      </div>
      
      <div class="container p-2" id="myAccount">
        <div class="row row-cols-1 row-cols-lg-3 g-4 py-5">
          <div class="col-md">
            <div class="card shadow">
              <svg class="bd-placeholder-img card-img-top" width="100%" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="white"/><text x="50%" y="50%" fill="red" dy=".3em">-15%</text></svg>
            
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                  <div class="codice" style="border: 2px dotted black; padding: 10px; background: white; color: #1e1e1e; font-weight: bold;">
                    <span>A123FGH</span>
                  </div>
                  <div class="card-text">sull'articolo meno caro</div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md">
            <div class="card shadow">
              <svg class="bd-placeholder-img card-img-top" width="100%" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="white"/><text x="50%" y="50%" fill="red" dy=".3em">-100%</text></svg>
  
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                  <div class="codice" style="border: 2px dotted black; padding: 10px; background: white; color: white;color: #1e1e1e; font-weight: bold;">
                    <span>B321GHF</span>
                  </div>
                  <div class="card-text">sui costi di spedizione</div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md">
            <div class="card shadow">
              <svg class="bd-placeholder-img card-img-top" width="100%" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="white"/><text x="50%" y="50%" fill="red" dy=".3em">-20%</text></svg>
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                  <div class="codice" style="border: 2px dotted black; padding: 10px; background: white; color: white;color: #1e1e1e; font-weight: bold;">
                    <span>C456FET</span>
                  </div>
                  <div class="card-text">su tutto il carrello</div>
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
