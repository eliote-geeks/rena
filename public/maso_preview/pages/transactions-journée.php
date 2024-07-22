<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Tables / Data - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <?php $current_page = "historique";?>
  <?php include_once "../php/entête-lvl3.php"; ?>

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

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
          <li class="breadcrumb-item"><a href="index.html">Historique</a></li>
          <li class="breadcrumb-item active">Transactions de la journée</li>
        </ol>
      </nav>  
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body"> <br>
            <div class="row mb-3" style="font-weight: bold; color: black;">
              <label for="fullName" class="col-md-4 col-lg-6 col-form-label">Montant total des cotisations : 20000FCFA </label>                
            </div>
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>Nom du mutualiste</th>
                    <th>Prenom du mutualiste</th>
                    <th>Matricule</th>
                    <th>Heure du paiement</th>
                    <th>Montant de la cotisation</th>
                  </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Nom client 1</td>
                        <td>Prenom client1</td>
                        <td>45HDTYS00056NK</td>
                        <td>12h50</td>
                        <td>1000FCFA</td>
                    </tr>
                    <tr>
                        <td>Nom client 2</td>
                        <td>Prenom client 2</td>
                        <td>45HDTYS00056NK</td>
                        <td>12h50</td>
                        <td>3500FCFA</td>
                    </tr>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main --> 
 
 <script src="../assets/js/main.js"></script>
</body>

</html>