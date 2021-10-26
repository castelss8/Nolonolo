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

    <main>
    <section id="log_section" class="mt-lg-0 pt-3 px-3">
    <div class="container">
        <div class="row pt-5 d-flex justify-content-center align-items-center" id="reg_row">
            <div class="col-sm col-md-4 col-lg-5">
              <h2 class="mb-lg-4 mb-md-3 mb-2 mt-3 ">Registrati alla piattaforma</h2>
              <p class="subtitle mb-lg-4 mb-md-2 mb-2 text-start">Per te prezzi speciali, coupon e tante altre offerte personalizzate! </span></p>
              <form method="post" class="mt-5" action="registrazione.php">
                <div class="form-floating mb-2">
                    <input type="text" placeholder="Inserisci il tuo nome" class="form-control" name="nome" required>
                    <label for="floatingInput">Inserisci il tuo nome</label>
                </div>
                <div class="form-floating mb-2">
                   <input type="text" placeholder="Inserisci il tuo cognome" class="form-control" name="cognome" required>
                    <label for="floatingInput">Inserisci il tuo cognome</label>
                </div>
                <div class="form-floating mb-2">
                    <input type="text" placeholder="Inserisci il tuo username" class="form-control" name="username" required>
                    <label for="floatingInput">Inserisci lo username</label>
                </div>
                <div class="form-floating mb-2">
                    <input type="email" placeholder="Inserisci il tuo indirizzo E-mail" class="form-control" name="email" required>
                    <label for="floatingInput">Inserisci la tua e-mail</label>
                </div>
                <div class="form-floating mb-2">
                    <input type="password" placeholder="Inserisci la tua password" class="form-control" name="passwordUtente" minlength="6"  required>
                    <label for="floatingInput">Inserisci la tua password</label>
                </div>
                <div class="form-floating mb-2">
                    <input type="date" placeholder="Inserisci la tua data di nascita" class="form-control" name="dataNascita" required>
                    <label for="floatingInput">Inserisci la tua data di nascita</label>
                </div>
                <button type="submit" name='submit' id='submit' class="btn btn-primary btn-block w-100"> Registrati  </button>
                <p class="text-start mt-5 redirect">Hai già un'account? Clicca <a href="../registrazione/registrazione.php">qui</a> per accedere.</p>
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