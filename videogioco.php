<?php
$videogioco = $_REQUEST['id'];
$prize = $_REQUEST['pz'];
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
try{
    $q="SELECT * FROM videogame WHERE id='$videogioco'";
    $run= $pdo -> query($q);
}catch(PDOException $e){
    die($q . "<br>" . $e->getMessage());
}
while($row = $run->fetch()) {
    $image = $row['immagine'];
    $title = $row['nome'];
    $description =  $row['descrizione'];
    $status =  $row['conservazione'];
    $availability = $row['disponibile'];
    $category = $row['categoria'];
}

?>
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
                <a class="nav-link" href="saldi.php">SALDI</a>
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
    <main class="container pt-5" id="videogame">
  <div class="row py-lg-5">
    <div class="col-md-8 p-4 order-2 order-md-2 order-lg-1">
        <div class="first">
            <h3 class="text-white">Descrizione</h3><hr>
            <p class="text-secondary"><?php echo  $description; ?></p>
        </div>
        <div class="second py-4">
            <h3 class="text-white">Informazioni aggiuntive</h3><hr>
            <div class="table-responsive">
                <table class="table text-secondary table-borderless">
                    <tbody>
                    <?php
                            echo '
                                <tr>
                                <th scope="row">Conservazione</th>
                                <td>'. $status.'</td>
                                </tr>
                                <tr>
                                <th scope="row">Disponibilità</th>
                                <td>'. $availability.'</td>
                                </tr>
                                <tr>
                                <th scope="row">Categoria</th>
                                <td>'. $category.'</td>
                                </tr>
                            ';
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="reviews py-4">
            <h3 class="text-white">Valutazioni e recensioni</h3><hr>
            <?php
            try{
                $q="SELECT * FROM RECENSIONE WHERE idVideogioco = '$videogioco'";
                $run= $pdo -> query($q);
            }catch(PDOException $e){
                die($q . "<br>" . $e->getMessage());
            }
            if($run->rowCount()>0){
                while($row = $run->fetch()) {
                    echo '<div class="review">
                    <div class="d-flex justify-content-start align-items-center">
                          <h4 class="text-white" style="font-size: 15px;">'. $row['email'] .'</h4>
                          <p class="text-secondary mt-3 ms-3" style="font-size: 10px;">'. $row['data'] .'</p></div>';
                          for ($i = 0; $i < $row['stelle']; $i++) {
                            echo '<span class="fa fa-star" style="color:yellow"></span>';
                          }
                          $dislike = 5 - $row['stelle'];
                          for($i=0; $i<$dislike; $i++){
                            echo '<span class="fa fa-star" style="color:grey"></span>';
                          }
                          echo '<p class="text-secondary mt-3">'. $row['testo'] .'</p>';
                    echo '</div>';
                }
            }else{
                echo '<p class=" text-secondary w-100">Non ci sono ancora recensioni per questo videogioco.</p>';
            }
            ?>
            <div class="pt-5">
                <h4 class="text-white">Lascia una recensione</h4>
                <?php
                if(empty($email)){
                    echo '<fieldset disabled> <p class="text-white fw-light note">Al momento questa opzione è disabilitata, accedi alla tua area privata per poter pubblicare una recensione</p>';
                }
                ?>
                    <form method="post" action="inviaRecensione.php">
                    <input type="hidden" name="videogame" id="videogame" value="<?php echo $videogioco; ?>">
                    <div class="form-floating pb-4">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="stars" id="stars" required>
                                <option value="1" selected>1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            <label for="floatingSelect">Seleziona il numero di stelle</label>
                        </div>
                        <div class="form-floating pb-4">
                            <textarea class="form-control" placeholder="Leave a comment here"  name="text" id="text" style="height: 100px" required></textarea>
                            <label for="floatingTextarea2">Scrivi il testo della recensione</label>
                        </div>
                        <button type="submit" class="btn btn-primary" name='review' id='review'>Invia</button>
                    </form>
                </fieldset>
            </div>
        </div>
    </div>

    <div class="col-md-4 p-4 order-sm-1 order-md-1 order-lg-2">
      <div class="p-lg-4 pb-1">
      <h2 class="text-white py-3 py-lg-1 name">
            <?php echo  $title; ?>
            </h2>
            <div class="d-flex justify-content-between">
                <div>
                <?php
                try{
                    $q="SELECT * FROM RECENSIONE WHERE idVideogioco = '$videogioco'";
                    $run= $pdo -> query($q);
                }catch(PDOException $e){
                    die($q . "<br>" . $e->getMessage());
                }
                $num = 0;
                $med = 0;
                if($run->rowCount()>0){
                    while($row = $run->fetch()) {
                        $num += $row['stelle'];
                    }
                    $count = $run->rowCount();
                    $m = $num / $count;
                    for($i=0; $i<$m; $i++){
                        echo '<span class="fa fa-star" style="color:yellow"></span>';
                    }
                }else{
                  $m = 0;
                  $count = 0;
                }
                $empty_stars = 5 - $m;
                for($i=0; $i<$empty_stars; $i++){
                    echo '<span class="fa fa-star" style="color:grey"></span>';
                }
                echo '</div><p class="text-secondary">'.$count.' valutazioni</p>';
                  ?>
            </div>
            
        <?php echo '<img src="' . $image . '" alt="videogame_img" class="img-fluid">'; ?>
    </div>
      <div class="px-lg-4 py-lg-2 py-4 ">
            <p class="prize p-2 text-center rounded text-dark"> 
              <?php 
              echo  $prize;
              ?> € </p>
              <?php
               $today = date ("Y/m/d");
              try{
                $q1="SELECT percentuale  FROM SALDI WHERE idVideogioco = '$videogioco' AND idStagioneSaldi IN(SELECT id FROM stagionesaldi WHERE dataFine > '$today')  ";
                $run1= $pdo -> query($q1);
              }catch(PDOException $e){
                  die($q1 . "<br>" . $e->getMessage());
              }
              if($run1->rowCount()>0){
                while($row1 = $run1->fetch()) {
                  echo '<p class="text-white mt-3 p-2 sales text-center">Questo videogioco è in saldo del '.$row1['percentuale'].'%</p>';
                }
              }
              ?>
            <?php
            if(!empty($email)){
                try{
                    $q="SELECT * FROM listadesideri WHERE email = '$email' AND id= '$videogioco'";
                    $run= $pdo -> query($q);
                }catch(PDOException $e){
                    die($q . "<br>" . $e->getMessage());
                }
                if($run->rowCount() == 0){
                    echo'<a href="aggiungi_preferito.php?id='. $videogioco .'" class="text-secondary">Desideri aggiungermi alla lista dei desideri?</a>';
                }else{
                echo'<a href="rimuovi_preferito.php?id='. $videogioco .'" class="text-secondary">Desideri rimuovermi dalla lista dei desideri?</a>';
                }
                echo '<div class="mt-5 p-4 rounded rent_form text-white" >
                        <h5 class=" text-center pb-3">Perchè non noleggiarmi? </h5>
                        <form>
                        <label class="form-label text-start">Seleziona una data di inizio noleggio</label>
                        <input type="date" class="w-100 rounded">
                        <label class="form-label text-start mt-4">Esprimi la durata del noleggio in termini di settimane</label>
                        <input type="text" class="w-100 rounded" placeholder="es. 1, 2 o 3">
                        <button type="submit" class="btn btn-primary mt-5 text-center w-100 ">Verifica disponibilità</button>
                        </form>

                      </div>';
            }else{
                echo '<p class="text-white pt-2 fw-light">Per poter noleggiare questo videogioco devi prima <a href="#"class="text-white">accedere </a> alla tua area privata.</p>';
            }
            ?>
        </div>
      </div>
    </div>
  </div>

</main>
    <script src="https://kit.fontawesome.com/7ae4aad1cd.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../js/topScroll.js"></script>
  </body>
</html>