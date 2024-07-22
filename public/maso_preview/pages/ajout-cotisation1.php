<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Créér un compte</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <?php $current_page = "home";?>
  <?php include_once "../php/entête-lvl3.php"; ?>

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
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Mutualistes</a></li>
          <li class="breadcrumb-item active">Enregistrer une cotisation</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">

        <div class="col-xl-9">

          <div class="card">
            <div class="card-body pt-3">
              <div class="row mb-3" style="font-weight: bold; color: black;">
                <label for="fullName" class="col-md-4 col-lg-6 col-form-label">Solde du compte : 20000FCFA </label>
                <label for="fullName" class="col-md-8 col-lg-6 col-form-label">Reste à cotiser : 6000FCFA</label>                 
              </div>
              <div class="row mb-3" style="font-weight: bold; color: gray;">
                <label for="fullName" class="col-form-label">Ajouter une cotisation au solde de NOM_BENEFICIAIRE_COTISATION</label>                
              </div>
              <div class="tab-content pt-2">

                <div class="" style="font-weight: bold; color: gray;">

                  <!-- Profile Edit Form -->
                  <form action="#" method="post" id="account-form">

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-5 col-form-label">Montant de la cotisation en FCFA :</label>
                      <div class="col-md-8 col-lg-6">
                        <input name="number" type="number" class="form-control" id="montantCotisation" placeholder="Entrez le montant de la cotisation" name="montantCotisation" required>
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="button" data-bs-toggle="modal" data-bs-target="#preview-modal" class="btn btn-primary">Valider</button>
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