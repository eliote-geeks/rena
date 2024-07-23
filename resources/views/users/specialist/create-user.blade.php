<x-layouts>
    <base href="/">


    <div class="pagetitle">
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item">Gestion des utilisateurs</li>
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
  
                  <div class="tab-content pt-2">
  
                    <div class="tab-pane fade show active profile-overview" id="addInfos">
  
                      <!-- Ajouter les informations du compte -->
  
                      <div class="" style="font-weight: bold; color: gray;">
                        <form action="#" method="post" id="account-form">                       
  
                          <div class="row mb-3">
                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nom complet :</label>
                            <div class="col-md-8 col-lg-9">
                              <input name="nomUtilisateur" type="text" class="form-control" id="nomUtilisateur" placeholder="Entrez le nom complet de l'utilisateur" required>
                            </div>
                          </div>
  
                          <div class="row mb-3">
                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Login :</label>
                            <div class="col-md-6 col-lg-7">
                              <input name="loginUtilisateur" type="text" class="form-control" id="loginUtilisateur" placeholder="Entrez le login de l'utilisateur" required>
                            </div>
                          </div>
  
                          <div class="row mb-3">
                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Mot de passe :</label>
                            <div class="col-md-8 col-lg-9">
                              <input name="pwdUtilisateur" type="password" class="form-control" id="pwdUtilisateur" placeholder="Entrez le mot de passe de l'utilisateur">
                            </div>
                          </div>
  
                          <div class="row mb-3">
                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Type de compte :</label>
                            <div class="col-md-8 col-lg-9">
                              <select name="sexe" type="text" class="form-control" required>
                                <option>Comptable</option>
                                <option>Commercial</option>
                                <option>Informaticien</option>
                                <option>Opérateur</option>
                              </select>
                            </div>
                          </div>
  
                          <div class="row mb-3">
                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Poste :</label>
                            <div class="col-md-8 col-lg-9">
                              <input name="posteUtilisateur" type="text" class="form-control" id="posteUtilisateur" placeholder="Entrez le poste de l'utilisateur" required>
                            </div>
                          </div>
  
                          <div class="row mb-3">
                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Pays de résidence:</label>
                            <div class="col-md-8 col-lg-9">
                              <select name="paysUtilisateur" type="text" class="form-control" id="paysUtilisateur" onchange="updatePhonePrefix()" required>
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
                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Numéro de téléphone :</label>
                            <div class="col-md-8 col-lg-9">
                              <input name="numeroUtilisateur" type="text" class="form-control" id="numeroUtilisateur" placeholder="Entrez le numéro de téléphone de l'utilisateur" required>
                            </div>
                          </div> 
  
                          <div class="text-center">
                            <button type="button" class="btn btn-primary">Suivant</button>
                          </div>
                        </form>
  
                        <!-- Fin Ajouter les informations du compte -->
  
                        </div>
                    </div>
  
                  </div>
  
                </div>
  
              </div>
            </div>
  
          </div>
        </div>
      </section>
  

</x-layouts>
