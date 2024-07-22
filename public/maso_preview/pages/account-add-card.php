<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Créér un compte</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <?php include_once "../php/entête-lvl3.php"; ?>
  <?php 
  
    
  if(isset($_POST["id_carte"]) && !empty($_POST["id_carte"])){
        
    $id_carte = $_POST["id_carte"];

    if(!ctype_digit($id_carte)) {

        $id_carte = remplace($id_carte);

    }

    $sql = "SELECT * FROM mutualistes WHERE id_carte = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $id_carte);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {

      $error = "Cette carte appartient déjà à un mutualiste";

    } else {

      $nom = $_SESSION["nom"];
      $prenom = $_SESSION["prenom"];
      $sexe = $_SESSION["sexe"];
      $pays = $_SESSION["pays"];
      $numero = $_SESSION["numero"];
      $dateNaissance = $_SESSION["dateNaissance"];
      $lieuNaissance = $_SESSION["lieuNaissance"];
      $profession = $_SESSION["profession"];
      $lieuResidence = $_SESSION["lieuResidence"];
      $repère = $_SESSION["repère"];
      $typePiece = $_SESSION["numeroPiece"];
      $numeroPiece = $_SESSION["dateDelivrancePiece"];
      $dateDelivrancePiece = $_SESSION["lieuDelivrancePiece"];
      $lieuDelivrancePiece = $_SESSION["lieuDelivrancePiece"];
      $beneficiaireDécès = $_SESSION["beneficiaireDécès"];
      $nomAssuré = [""];
      $img = "blank";
      $matricule = uniqid() . $id_carte;

      for($i=1;$i<=10;$i++) {

        if(isset($_POST["nomAssuré" . $i]) && !empty($_POST["nomAssuré1" . $i])) {
    
          $nomAssuré[$i] = $_SESSION[$nomAssuré[$i]] ;
    
        } else {
    
          $nomAssuré[$i] =  "blank";
    
        }
    
      }

      $sql = "INSERT INTO mutualistes (matricule, nom, prenom, sexe, pays, numero, dateNaissance, lieuNaissance, profession, lieuResidence, repère, typePiece, numeroPiece, dateDelivrancePiece, lieuDelivrancePiece, beneficiaireDécès, nomAssuré1, nomAssuré2, nomAssuré3, nomAssuré4, nomAssuré5,nomAssuré6, nomAssuré7, nomAssuré8, nomAssuré9, nomAssuré10, img, id_carte) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("ssssssssssssssssssssssssssss", $matricule, $nom, $prenom, $sexe, $pays, $numero, $dateNaissance, $lieuNaissance, $profession, $lieuResidence, $repère, $typePiece, $numeroPiece, $dateDelivrancePiece, $lieuDelivrancePiece, $beneficiaireDécès, $nomAssuré[1], $nomAssuré[2], $nomAssuré[3], $nomAssuré[4], $nomAssuré[5], $nomAssuré[6], $nomAssuré[7], $nomAssuré[8], $nomAssuré[9], $nomAssuré[10], $img, $id_carte);
      if($stmt->execute()) {

        $error = "tout est ok";

      }
    }

  }
  
  ?>

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Attribuer une carte au mutualiste</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
          <li class="breadcrumb-item">Mutualistes</li>
          <li class="breadcrumb-item active">Créer un compte</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">

        <div class="col-xl-9">

          <div class="card">
            <div class="card-body pt-3">
              <div class="tab-content pt-2">

                <div class="" style="font-weight: bold; color: gray;">

                  <!-- Profile Edit Form -->
                  <form action="#" method="post" id="account-form">

                  <div class="centered-div ">
                            <div class="form-floating mb-3">
                          <center>  <div class="spinner-grow text-primary" style="width: 7rem; height: 7rem;">
                                <span class="visually-hidden">Loading...</span>
                              </div></center>
                            </div>
                            <h1 class="fw-bold text-black"><center>APPROCHEZ LA CARTE DU MUTUALISTE POUR CREER SON COMPTE</center></h1> 
                            <div class="form-floating mb-3">
                              <input type="text" class="form-control visually-hidden" id="floatingInput" placeholder="Password" name="id_carte" autofocus>
                            </div>
                            <hr class="my-3">
                            <?php if(isset($error)) {?>
                            <center><label class="text-danger"><?=$error?></label></center>
                            <?php }?>
                          
                        </div>
                      </div>
                  </div>
                </div>  
                  </form><!-- End Profile Edit Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

</body>

</html>