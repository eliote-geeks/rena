<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Créér un compte</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

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

                <!-- Menu de navigation -->
                <ul class="nav nav-tabs nav-tabs-bordered">

                  <li class="nav-item">
                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#addInfos">Remplir les informations</button>
                  </li>

                  <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#confirmInfos">Confirmer les informations</button>
                  </li>

                  <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#addCarte">Attribuer une carte</button>
                  </li>

                </ul>
                <!-- Fin Menu de navigation -->

                <div class="tab-content pt-2">

                  <div class="tab-pane fade show active profile-overview" id="addInfos">

                    <!-- Ajouter les informations du compte -->

                    <div class="" style="font-weight: bold; color: gray;">
                      <form action="#" method="post" id="account-form">
                        <div class="row mb-3">
                          <label for="profileImage" class="col-md-4 col-lg-4 col-form-label">Photo du mutualiste</label>
                          <div class="col-md-8 col-lg-9">
                            <div class="square overflow-hiddden" style="width: 115px; height:115px;">
                              <img src="../assets/img/blank_image.jpg" class="img-fluid h-100 w-100" id="imgPreview">
                            </div>
                            <div class="pt-2">
                              <input type="file" name="imgMutualiste" id="imgMutualiste" class="d-none" accept="image/*">
                              <label for="imgMutualiste" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                            </div>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nom :</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="nom" type="text" class="form-control" id="nom" placeholder="Entrez le nom complet du mutualiste" required>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Prénom :</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="prenom" type="text" class="form-control" id="prenom" placeholder="Entrez le prénom du mutualiste" required>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Sexe :</label>
                          <div class="col-md-8 col-lg-9">
                            <select name="sexe" type="text" class="form-control" id="sexe" onchange="updatePhonePrefix()" required>
                              <option value="">Selectionnez le sexe</option>
                              <option>Masculin</option>
                              <option>Féminin</option>
                            </select>
                          </div>
                        </div>


                        <div class="row mb-3">
                          <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Pays de résidence:</label>
                          <div class="col-md-8 col-lg-9">
                            <select name="pays" type="text" class="form-control" id="pays" onchange="updatePhonePrefix()" required>
                              <option value="">Selectionnez le pays de résidence</option>
                              <option value="Cameroun">Cameroun</option>
                              <option value="Côte d'Ivoire">Côte d'Ivoire</option>
                              <option value="Russie">Russie</option>
                              <option value="Canada">Canada</option>
                              <option value="United Kingdom">United Kingdom</option>
                              <option value="France">France</option>
                              <option value="Germany">Germany</option>
                            </select>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="fullName" class="col-md-3 col-lg-3 col-form-label">Numéro de téléphone :</label>
                          <div class="col-md-9 col-lg-9">
                            <input name="numero" type="text" class="form-control" id="numero" placeholder="Entrez le numéro de téléphone du mutualiste" type="number" required>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Date de naissance :</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="dateNaissance" type="date" class="form-control" id="dateNaissance" value="Kevin Anderson" required>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Lieu de naissance :</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="lieuNaissance" type="text" class="form-control" id="lieuNaissance" placeholder="Entrez le lieu de naissance du mutualiste" required>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Profession :</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="profession" type="text" class="form-control" id="profession" placeholder="Entrez la profession du mutualiste" required>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Lieu de résidence :</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="lieuResidence" type="text" class="form-control" id="lieuResidence" placeholder="Entrez le lieu de résidence du mutualiste" required>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Point de repère :</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="repère" type="text" class="form-control" id="repère" placeholder="Entrez le point de repère du lieu de résidence" required>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Type de pièce d'identification :</label>
                          <div class="col-md-8 col-lg-9">
                            <select name="typtPiece" type="text" class="form-control" id="typePiece" required>
                              <option value="">Veuillez sélectionner le type de pièce d'identification</option>
                              <option>CNI</option>
                              <option>Récépissé</option>
                              <option>Passport</option>
                              <option>Carte de séjour</option>
                              <option>Carte de réfugié</option>
                            </select>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="fullName" class="col-md-3 col-lg-3 col-form-label">N° pièce d'identification :</label>
                          <div class="col-md-9 col-lg-9">
                            <input name="numeroPiece" type="text" class="form-control" id="numeroPiece" type="number" placeholder="Entrez le numéro de la pièce d'identification" pattern="[0-9]*" oninput="this.value = this.value.replace(/[^0-9]/g, '');" required>
                          </div>
                        </div>
                      
                        <div class="row mb-3">
                          <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Date délivrance pièce d'identification :</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="dateDelivrancePiece" type="date" class="form-control" id="dateDelivrancePiece" required>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Lieu de délivrance pièce d'identification :</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="lieuDelivrancePiece" type="text" class="form-control" id="lieuResidencePiece" placeholder="Entrez le lieu de délivrance de la pièce d'identification" required>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Situation matrimoniale :</label>
                          <div class="col-md-8 col-lg-9">
                            <select name="situationMatrimoniale" type="text" class="form-control" id="situationMatrimoniale" required>
                              <option value="">Veuillez sélectionner la situation matrimoniale</option>
                              <option>Célibataire</option>
                              <option>Marié(e)</option>
                              <option>Veuf/Veuve</option>
                            </select>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nom complet du bénéficiaire en cas de décès :</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="beneficiaireDécès" type="text" class="form-control" id="beneficiaireDécès" placeholder="Entez le nom du bénéficiare en cas de décès" required>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Noms des assurés secondaires :</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="nomAssuré1" type="text" class="form-control" id="nomAssuré1" placeholder="Entrez le nom de l\'assuré secondaire N°1" required> <br>
                            <div id="input-container" style="margin-top: 8px;"></div> 
                            <div class="icon" style="margin-top: 15px;">
                              <i class="bi bi-plus-circle-fill text-success add-input" style="cursor: pointer;">Ajouter</i>
                            </div>
                          </div>
                        </div>

                        <div class="text-center">
                          <button type="button" data-bs-toggle="modal" data-bs-target="#preview-modal" class="btn btn-primary">Suivant</button>
                        </div>
                      </form>

                      <!-- Fin Ajouter les informations du compte -->

                      </div>
                  </div>

                  <div class="tab-pane fade profile-overview pt-3" id="confirmInfos">

                    <!-- Confirmer les informations du compte -->

                    <div class="" style="font-weight: bold; color: gray;">

                      <div class="row mb-3">
                        <label for="profileImage" class="col-md-4 col-lg-4 col-form-label">Photo du mutualiste</label>
                        <div class="col-md-8 col-lg-9">
                          <div class="square overflow-hiddden" style="width: 115px; height:115px;">
                            <img src="../assets/img/blank_image.jpg" class="img-fluid h-100 w-100" id="imgPreview">
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="label ">Nom : <label for="" class="text-dark">Kevin Anderson</label></div>
                      </div>

                      <div class="row">
                        <div class="label">Prenom : <label for="" class="text-dark">Franck</label></div>
                      </div>

                      <div class="row">
                        <div class="label">Sexe : <label for="" class="text-dark">Masculin</label></div>
                      </div>

                      <div class="row">
                        <div class="label">Pays de résidence : <label for="" class="text-dark">Cameroun</label></div>
                      </div>

                      <div class="row">
                        <div class="label">Numero de téléphone : <label for="" class="text-dark">+237 652337362</label></div>
                      </div>

                      <div class="row">
                        <div class="label">Date de naissance : <label for="" class="text-dark">14/08/2024</label></div>
                      </div>

                      <div class="row">
                        <div class="label">Lieu de naissance : <label for="" class="text-dark">Yaoundé</label></div>
                      </div>

                      <div class="row">
                        <div class="label">Profession : <label for="" class="text-dark">Vendeur</label></div>
                      </div>

                      <div class="row">
                        <div class="label">Lieu de résidence : <label for="" class="text-dark">Colombia</label></div>
                      </div>

                      <div class="row">
                        <div class="label">Point de repère : <label for="" class="text-dark">Boutique Orange</label></div>
                      </div>

                      <div class="row">
                        <div class="label">Type de pièce d'identification : <label for="" class="text-dark">CNI</label></div>
                      </div>

                      <div class="row">
                        <div class="label">N° pièce d'identification : <label for="" class="text-dark">25658988745</label></div>
                      </div>

                      <div class="row">
                        <div class=" label">Date de délivrance pièce d'identification : <label for="" class="text-dark">18/04/2020</label></div>
                      </div>

                      <div class="row">
                        <div class="label">Lieu de délivrance : <label for="" class="text-dark">CDE-06</label></div>
                      </div>

                      <div class="row">
                        <div class="label">Situation Matrimoniale : <label for="" class="text-dark">Célibataire</label></div>
                      </div>

                      <div class="row">
                        <div class="label">Nom du bénéficiaire en cas de décès : <label for="" class="text-dark">Bénéficiaire</label></div>
                      </div>

                      <div class="row">
                        <div class="label">Assuré secondaire N°1 : <label for="" class="text-dark">Assuré 1</label></div>
                      </div>

                      <div class="row">
                        <div class="label">Assuré secondaire N°2 : <label for="" class="text-dark">Assuré 1</label></div>
                      </div>

                      <div class="row">
                        <div class="label">Assuré secondaire N°3 : <label for="" class="text-dark">Assuré 1</label></div>
                      </div>

                      <div class="row">
                        <div class="label">Assuré secondaire N°4 : <label for="" class="text-dark">Assuré 1</label></div>
                      </div>

                      <div class="row">
                        <div class="label">Assuré secondaire N°5 : <label for="" class="text-dark">Assuré 1</label></div>
                      </div>

                      <div class="row">
                        <div class="label">Assuré secondaire N°6 : <label for="" class="text-dark">Assuré 1</label></div>
                      </div>

                      <div class="row">
                        <div class="label">Assuré secondaire N°7 : <label for="" class="text-dark">Assuré 1</label></div>
                      </div>

                      <div class="row">
                        <div class="label">Assuré secondaire N°8 : <label for="" class="text-dark">Assuré 1</label></div>
                      </div>

                      <div class="row">
                        <div class="label">Assuré secondaire N°9 : <label for="" class="text-dark">Assuré 1</label></div>
                      </div>

                      <div class="row">
                        <div class="label">Assuré secondaire N°10 : <label for="" class="text-dark">Assuré 1</label></div>
                      </div>

                      <div class="text-center">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#preview-modal" class="btn btn-primary">Suivant</button>
                      </div>
                    </div>

                     <!-- Fin Confirmer les informations du compte -->
                    
                  </div>

                  <div class="tab-pane fade pt-3" id="addCarte">
                    
                   <!-- Attribuer une carte au compte -->

                    <div class="" style="font-weight: bold; color: gray;">

                      <!-- Profile Edit Form -->
                      <form action="#" method="post" id="account-form">

                        <div class="centered-div ">
                          <div class="form-floating mb-3">
                            <center>  
                              <div class="spinner-grow text-primary" style="width: 7rem; height: 7rem;">
                                <span class="visually-hidden">Loading...</span>
                              </div>
                            </center>
                          </div>
                            <h1 class="fw-bold text-black"><center>APPROCHEZ LA CARTE DU MUTUALISTE POUR CREER SON COMPTE</center></h1> 
                            <div class="form-floating mb-3">
                              <input type="text" class="form-control visually-hidden" id="floatingInput" placeholder="Password" name="id_carte" autofocus>
                            </div>
                            <hr class="my-3">
                            <center><label class="text-danger">Erreur</label></center>
                            </div>
                          </div>
                      </div>
                    </div>  

                    <!-- Fin Attribuer une carte au compte -->

                  </div>

                </div>

              </div>

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- Debut gestion champs Pays/Numero de téléphone -->

  <script>

        document.addEventListener("DOMContentLoaded", function() {
          const countrySelect = document.getElementById("country");
          const phoneInput = document.getElementById("phone");

          countrySelect.addEventListener ("change", function() {
            const selectedOption = this.options[this.selectedIndex];
            const dialCode = selectedOption.getAttribute("data-dial-code");
            phoneInput.value = dialCode;
          })
        })

  </script>

  <script>
    function updatePhonePrefix() {
      const countrySelect = document.getElementById('pays');
      const selectedCountry = countrySelect.value;
      const phoneInput = document.getElementById('numero');

      switch (selectedCountry) {
        case 'United Kingdom':
          phoneInput.value = '+1 ';
          break;
        case 'Canada':
          phoneInput.value = '+1 ';
          break;
        case 'Russie':
          phoneInput.value = '+44 ';
          break;
        case 'France':
          phoneInput.value = '+33 ';
          break;
        case 'Germany':
          phoneInput.value = '+49 ';
          break;
        case 'Cameroun':
          phoneInput.value = '+237 ';
          break;
        case 'Côte d\'Ivoire':
          phoneInput.value = '+241 ';
          break;
        default:
          phoneInput.value = '';
          break;
      }
    }
  </script>
  <!-- Fin gestion champs Pays/Numero de téléphone -->
  
  <!-- Debut gestion champs Assurés secondaires -->

  <script>
    let inputCount = 1;

    document.querySelector('.add-input').addEventListener('click', () => {
      if (inputCount <= 9) {
        const inputGroup = document.createElement('div');
        inputGroup.classList.add('input-group', 'mb-3');

        const input = document.createElement('input');
        input.type = 'text';
        input.classList.add('form-control');
        input.name = `nomAssuré${inputCount + 1}`;
        input.id = `nomAssuré${inputCount + 1}`;
        let a = inputCount + 1;
        input.placeholder = 'Entrez le nom de l\'assuré secondaire N°' + a;

        const button = document.createElement('button');
        button.classList.add('btn', 'btn-danger', 'remove-input');
        button.innerHTML = '<i class="bi bi-trash"></i>';

        inputGroup.appendChild(input);
        inputGroup.appendChild(button);

        document.getElementById('input-container').appendChild(inputGroup);

        button.addEventListener('click', () => {
          inputGroup.remove();
          inputCount--;
        });

        inputCount++;
      } 
    });
  </script>

  <script>
        $(document).ready(function() {
            $('#submit-modal-btn').click(function() {
                $.ajax({
                    type: 'POST',
                    url: '../php/add-account.php',
                    data: $('#account-form').serialize(),
                    success: function(response) {
                        window.location.href = 'account-add-card.php';
                    },
                    error: function() {
                        $('#message').text('Une erreur est survenue lors de l\'insertion');
                    }
                });
            });
        });
    </script>
     <!-- Fin gestion champs Assurés secondaires -->

</body>

</html>