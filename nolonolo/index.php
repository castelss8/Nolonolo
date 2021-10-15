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
    <link href="css/style.css?ts=<?=time()?>&quot" rel="stylesheet">

  </head>
  <body>
  <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-arrow-up"></i></button>
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
                <a class="nav-link" href="#">PRODOTTI</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">SALDI</a>
              </li>
              <li class="nav-item">
                <a class="nav-link pb-5 pb-sm-0" href="#">ASSISTENZA</a>
              </li>
              <li class="nav-item">
                <a class="nav-link login mt-5" href="#">Accedi / Iscriviti</a>
              </li>
            </ul>
            <a class="nav-link user" href="#"><i class="far fa-user"></i></a>
          </div>
        </div>
      </nav>
    </header>
    <main>
      <section id="welcome_home" class="mt-lg-0 pt-5 px-3">
        <div class="container">
          <div class="row pt-5 pt-md-4 pt-lg-3 d-flex justify-content-center align-items-center">
            <div class="col-md">
              <h1 class="mb-lg-4 mb-md-3 mb-2 ">Sperimenta l'inimmaginabile</h1>
              <p class="subtitle mb-lg-4 mb-md-3 mb-2 text-start">Noleggia un videogioco a realtà virtuale e <span class="subtitle_span ms-1"> vivi la tua prossima avventura. </span></p>
              <form class="d-flex">
                <input class="form-control search_bar" type="text" placeholder="Cerca.." aria-label="Search">
                <button class="btn btn-outline-success search_button" type="submit"><i class="fas fa-search"></i></button>
              </form>
            </div>
            <div class="col-md">
              <video src="media/homeVideo.mp4" autoplay muted loop class="rounded mx-auto d-block img-thumbnail img-fluid mt-5"></video><br><br>
            </div>
          </div>
        </div>
      </section>
      <section id="highlight_home" class="px-3">
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
