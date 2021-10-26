<?php
require 'connection.php';
global $pdo;
if(!empty($_SESSION['emailutente'])){
  $email=$_SESSION['emailUtente'];
  try{
    $q="SELECT stato FROM cliente WHERE email = '$email'";
    $run= $pdo -> query($q2);
  }catch(PDOException $e){
    die($q . "<br>" . $e->getMessage());
  }
  if($run->rowCount()>0){
      while($row = $run1->fetch()) {
          $user_type = $row['stato'];
        }
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
                <a class="nav-link" href="../index.php">HOME</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="catalogo.php">CATALOGO</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="#">SALDI</a>
              </li>
              <?php
              if(!empty($email)){
                echo 'li class="nav-item">
                        <a class="nav-link" href="desideri.php">LA TUA LISTA DEI DESIDERI</a>
                      </li>';
              }
              ?>
              <li class="nav-item">
                <a class="nav-link login mt-5" href="<?php $page = (isset($_SESSION['EmailUtente'])) ? 'myAccount-profilo.php' : 'login.php'; echo $page; ?>"> <?php $page = (isset($_SESSION['EmailUtente'])) ? 'La tua area personale' : 'Accedi/Registrati'; echo $page; ?> </a>
              </li>
            </ul>
            <a class="nav-link user" href="<?php $page = (isset($_SESSION['EmailUtente'])) ? 'myAccount-profilo.php' : 'login.php'; echo $page; ?>"><i class="far fa-user"></i></a>
          </div>
        </div>
      </nav>
    </header>
    <main>
        <section id="catalogue"  class="pt-5 px-3">
          <div class="container">
            <?php
            $today = date ("Y/m/d");
                try{
                    $q="SELECT * FROM STAGIONESALDI WHERE dataFine > '$today' "; //ricordarsi che lato amministratore non si può inserire lo stesso videogioco scontato in due stagioni di saldi attive contemporaneamente
                    $run= $pdo -> query($q);
                }catch(PDOException $e){
                    die($q . "<br>" . $e->getMessage());
                }
                if($run->rowCount()>0){
                    while($row = $run->fetch()) {
                        $sales_id = $row['ID'];
                        echo '<h2 class="pt-5 text-white">'. $row['titolo'] .'</h2>';
                        echo '<div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 py-3">';
                        try{
                            $q1="SELECT * FROM videogame WHERE id IN(SELECT idVideogioco FROM SALDI WHERE idStagioneSaldi = '$sales_id')"; //ricordarsi di aggiungere che deve essere inserito nel catalogo solo se disponibile (se è da fare)
                            $run1= $pdo -> query($q1);
                        }catch(PDOException $e){
                            die($q1 . "<br>" . $e->getMessage());
                        }
                        if($run1->rowCount()>0){
                            while($row1 = $run1->fetch()) {
                                $videogame = $row1['id'];
                                try{
                                    $q2="SELECT percentuale FROM SALDI WHERE idStagioneSaldi = '$sales_id' AND idVideogioco = $videogame";
                                    $run2= $pdo -> query($q2);
                                }catch(PDOException $e){
                                    die($q2 . "<br>" . $e->getMessage());
                                }
                                while($row2 = $run2->fetch()) {
                                    $percentuale = $row2['percentuale'];
                                }
                                if(!empty($email) && $user_type = "pro"){
                                    $percent = ( $row1['pzFissoPro'] * $percentuale) / 100;
                                    $new_prize = $row1['pzFissoPro'] - $percent;
                                    $old_prize = $row1['pzFissoPro'];
                                }elseif(!empty($email) && $user_type = "genius"){
                                    $percent = ( $row1['pzFissoGenius'] * $percentuale) / 100;
                                    $new_prize = $row1['pzFissoGenius'] - $percent;
                                    $old_prize = $row1['pzFissoGenius'];
                                }else{
                                    $percent = ( $row1['pzFissoBaby'] * $percentuale)/100;
                                    $new_prize = $row1['pzFissoBaby'] - $percent;
                                    $old_prize = $row1['pzFissoBaby'];
                                }
                                echo '<div class="col d-flex justify-content-center">';
                                echo '<div class="card mt-2">';
                                echo '<img src="' . $row1['immagine'] . '" class="card-img-top" alt="videogame_img">
                                    <div class="card-body rounded d-flex justify-content-between align-items-center">
                                    <p><a href="videogioco.php?id='.$row1['id'].'&pz='.$new_prize.'" class="card-title text-white text-decoration-none">' . $row1['nome'] . '</a></p>
                                    <p> <span class="discounted p-2 rounded-pill me-3">'. $new_prize .' € </span> <span class="full">'. $old_prize .' €</span></p>';
                                echo '</div></div></div>';
                            }
                        }
                        echo '</div>';   
                    }
                }else{
                  echo '<h3 class="text-center text-secondary w-100">Spiacenti, al momento non ci sono saldi da visualizzare. <br> Stay tuned.</h3>';
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