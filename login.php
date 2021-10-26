<!doctype html>
<html>
  <head>
    <title>nolonolo</title>
    <meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta NAME="DC.Title" CONTENT="nolonolo">
		<meta NAME="DC.Creator" CONTENT="Forieri Elena, Castelli Giorgia, Cassanelli Alice">
		<meta NAME="DC.Subject" CONTENT="Videogiochi ed attrezzatura VR">
		<meta NAME="DC.Description" CONTENT="Guida e supporto al noleggio di videogiochi ed attrezzatura VR">
		<meta NAME="DC.Date" CONTENT="2021/08/19">
		<meta NAME="DC.Language" CONTENT="Italiano">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="../css/style.css?ts=<?=time()?>&quot" rel="stylesheet">
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
              <?php
              if(isset($_SESSION['EmailUtente'])){
                echo 'li class="nav-item">
                        <a class="nav-link" href="desideri.php">LA TUA LISTA DEI DESIDERI</a>
                      </li>';
              }
              ?>
              <li class="nav-item">
                <a class="nav-link login mt-5 active" href="#"> <?php $page = (isset($_SESSION['EmailUtente'])) ? 'La tua area personale' : 'Accedi/Registrati'; echo $page; ?> </a>
              </li>
            </ul>
            <a class="nav-link user active" href="#"><i class="far fa-user"></i></a>
          </div>
        </div>
      </nav>
    </header>
    
    <?php
    require 'connection.php';
    global $pdo;

    if(isset($_POST['login'])){
        $emailUtente = $_POST['email'];
        $passwordUtente = $_POST['password'];
        $passwordUtente = md5($passwordUtente);
        try{
            $sql = "SELECT * FROM Utente WHERE email='$emailUtente'"; //CONTROLLARE ANCHE PASSWORD
            $res = $pdo->query($sql);
        }catch(PDOException $e){echo $e->getMessage();}

        if($res->rowCount() > 0){
            $_SESSION['EmailUtente'] = $emailUtente;
            try{
                $sql = "SELECT tipo FROM utente WHERE Email='$emailUtente'";
                $res= $pdo->query($sql);
                $row = $res->fetch();
                $tipoUtente = $row['tipo'];
                $_SESSION['TipoUtente'] = $tipoUtente;
            }catch(PDOException $e){echo $e->getMessage();}
                header('Location: ../index.php');
        }else
            echo "<script> alert('I dati non risultano corretti, sicuro di esserti registrato?'); window.location.href='login.php'; </script>";
    }
    ?>

    <main>
    <section id="log_section" class="mt-lg-0 pt-3 px-3">
    <div class="container">
        <div class="row pt-5 d-flex justify-content-center align-items-center" id="log_row">
            <div class="col-sm col-md-5 col-lg-5">
              <h2 class="mb-lg-4 mb-md-3 mb-2 mt-3">Accedi alla tua area privata</h2>
              <p class="subtitle mb-lg-4 mb-md-3 mb-2 text-start">Per te prezzi speciali, coupon e tante altre offerte personalizzate! </span></p>
              <form method="post" class="mt-5" action="login.php">
                <div class="form-floating mb-2">
                    <input type="email" class="form-control" name="email" id="email" placeholder="name@example.it" required>
                    <label for="floatingInput">Inserisci la tua e-mail</label>
                </div>
                <div class="form-floating mb-2">
                    <input type="password" class="form-control" name="password" id="password" placeholder="12345678" required>
                    <label for="floatingInput">Inserisci la tua password</label>
                </div>
                <button type="submit" name='login' id='login' class="btn btn-primary btn-block w-100"> Accedi  </button>
                <p class="text-start mt-5 redirect">Non hai un'account? Clicca <a href="registrazione.php">qui</a> per registrarti</p>
            </form>
            </div>
          </div>
    </div>
  </section>
    </main>
    <script src="https://kit.fontawesome.com/7ae4aad1cd.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
