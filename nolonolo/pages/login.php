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

  if(isset($_POST['login'])){
      $emailUtente = $_POST['email'];
      $passwordUtente = $_POST['password'];
      $passwordUtente = md5($passwordUtente);
      try{
          $sql = "SELECT * FROM Utente WHERE email='$emailUtente'";
          $res = $pdo->query($sql);
      }catch(PDOException $e){echo $e->getMessage();}

      if($res->rowCount() > 0){
          $_SESSION['EmailUtente'] = $emailUtente;
          try{
              $sql = "SELECT tipo FROM utente WHERE Email='$emailUtente'";
              $res= $pdo->query($sql);
              $row = $res->fetch();
              $tipoUtente= $row['tipo'];
              $_SESSION['TipoUtente']=$tipoUtente;
          }catch(PDOException $e){echo $e->getMessage();}
            header('Location: home.html');
      }else
          echo "<script> alert('I dati non risultano corretti, sicuro di esserti registrato?'); window.location.href='login.php'; </script>";
  }

  ?>
  <section id="quarta" style="background: #1e1e1e;">
    <div class="container">
      <h2>Login</h2>
      <div class="card-body">
      <form method="post">
        <div class="form-group input-group">
          <input type="text" placeholder="Inserisci la tua email" class="form-control" name="email" id="email" required>
        </div>

        <div class="form-group input-group">
          <input type="password" placeholder="Inserisci la tua password" class="form-control" name="password" id="password" required>
        </div>

        <div class="form-group">
          <button type="submit" name='login' id='login' class="btn btn-primary btn-block"> Login  </button>
        </div>
        <p class="text-center">Non hai un'account? <a href="../registrazione/registrazione.php">Registrati!</a> </p>

      </form>
      </div>
    </div>
  </section>


  </body>

</html>