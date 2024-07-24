<x-layouts>
    <base href="/">

    <div class="pagetitle">
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item">Mutualistes</li>
            <li class="breadcrumb-item active">Cotisations des mutualistes</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->

      <section class="section profile">
        <div class="row">

          <div class="col-xl-10">

            <div class="card">
              <div class="card-body pt-3">
                <div class="tab-content pt-2">

                  <!-- Bordered Tabs -->
                  <ul class="nav nav-tabs nav-tabs-bordered">

                    <li class="nav-item">
                      <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#searchCarte">Informations sur le mutualiste</button>
                    </li>

                    <!-- DEBUT MODIFICATION -->
                    <!-- DEBUT MODIFICATION -->
                    <!-- DEBUT MODIFICATION -->

                    <li class="nav-item">
                      <button class="nav-link" data-bs-toggle="tab" data-bs-target="#solde">Solde</button>
                    </li>

                    <!-- FIN MODIFICATION -->
                    <!-- FIN MODIFICATION -->
                    <!-- FIN MODIFICATION -->

                    <li class="nav-item">
                      <button class="nav-link" data-bs-toggle="tab" data-bs-target="#searchNom">Historique des cotisations</button>
                    </li>

                    <!-- DEBUT MODIFICATION -->
                    <!-- DEBUT MODIFICATION -->
                    <!-- DEBUT MODIFICATION -->

                    <li class="nav-item">
                      <button class="nav-link" data-bs-toggle="tab" data-bs-target="#eligibilité">Eligibilité</button>
                    </li>
                    
                    <li class="nav-item">
                      <button class="nav-link" data-bs-toggle="tab" data-bs-target="#assistances">Historique des assistances</button>
                    </li>

                    <!-- FIN MODIFICATION -->
                    <!-- FIN MODIFICATION -->
                    <!-- FIN MODIFICATION -->

                  </ul>

                  <div class="tab-content pt-2">

                    <div class="tab-pane fade show active profile-overview" id="searchCarte">
                      <div class="" style="font-weight: bold; color: gray;">

                        <div class="row mb-3">
                          <label for="profileImage" class="col-md-4 col-lg-4 col-form-label">Photo du mutualiste</label>
                          <div class="col-md-8 col-lg-9">
                            <div class="square overflow-hiddden" style="width: 115px; height:115px;">
                              <img src="{{ $mutualist->user->profile_photo_url }}" class="img-fluid h-100 w-100" id="imgPreview">
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="label ">Nom : <label for="" class="text-dark">{{ $mutualist->first }}</label></div>
                        </div>

                        <div class="row">
                          <div class="label">Prenom : <label for="" class="text-dark">{{ $mutualist->last }}</label></div>
                        </div>

                        <div class="row">
                          <div class="label">Sexe : <label for="" class="text-dark">{{ $mutualist->sex }}</label></div>
                        </div>

                        <div class="row">
                          <div class="label">Pays de résidence : <label for="" class="text-dark">{{ $mutualist->country }}</label></div>
                        </div>

                        <div class="row">
                          <div class="label">Numero de téléphone : <label for="" class="text-dark">{{ $mutualist->phone }}</label></div>
                        </div>

                        <div class="row">
                          <div class="label">Date de naissance : <label for="" class="text-dark">{{ \Carbon\Carbon::parse($mutualist->birth_date) }}</label></div>
                        </div>

                        <div class="row">
                          <div class="label">Lieu de naissance : <label for="" class="text-dark">{{ $mutualist->birth_date }}</label></div>
                        </div>

                        <div class="row">
                          <div class="label">Profession : <label for="" class="text-dark">{{ $mutualist->work }}</label></div>
                        </div>

                        <div class="row">
                          <div class="label">Lieu de résidence : <label for="" class="text-dark">{{ $mutualist->localisation }}</label></div>
                        </div>

                        <div class="row">
                          <div class="label">Point de repère : <label for="" class="text-dark">{{ $mutualist->repere }}</label></div>
                        </div>

                        <div class="row">
                          <div class="label">Type de pièce d'identification : <label for="" class="text-dark">{{ $mutualist->identification_type }}</label></div>
                        </div>

                        <div class="row">
                          <div class="label">N° pièce d'identification : <label for="" class="text-dark">{{ $mutualist->num_identification }}</label></div>
                        </div>

                        <div class="row">
                          <div class=" label">Date de délivrance pièce d'identification : <label for="" class="text-dark">{{ \Carbon\Carbon::parse($mutualist->date_delivry)->format('d, M Y') }}</label></div>
                        </div>

                        <div class="row">
                          <div class="label">Situation Matrimoniale : <label for="" class="text-dark">{{ $mutualist->matrimonial }}</label></div>
                        </div>

                        <div class="row">
                          <div class="label">Nom du bénéficiaire en cas de décès : <label for="" class="text-dark">{{ $mutualist->beneficiary }}</label></div>
                        </div>

                    
                       

                        <div class="text-center">
                          <button type="button" data-bs-toggle="modal" data-bs-target="#preview-modal" class="btn btn-primary">Suivant</button>
                        </div>
                        
                      </div>
                    </div>
                    
                    <!-- DEBUT MODIFICATION -->
                    <!-- DEBUT MODIFICATION -->
                    <!-- DEBUT MODIFICATION -->

                    <div class="tab-pane fade pt-3" id="solde">
          
                      <table class="table datatable">
                        <thead>
                          <tr>
                            <th class="align-middle">Solde du compte</th>
                            <th class="align-middle">Année</th>
                          </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="align-middle">18000FCFA</td>
                                <td class="align-middle">2024</td>
                            </tr>
                        </tbody>
                      </table>

                    </div>

                    <div class="tab-pane fade profile-overview pt-3" id="searchNom">
                      <!-- Confirm_information -->
                      
                      <table class="table datatable">
                        <thead>
                          <tr>
                            <th>
                              Nom de l'agent
                            </th>
                            <th>Date du paiement</th>
                            <th>Heure du paiement</th>
                            <th>Montant de la transaction</th>
                            <th>Année</th>
                          </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td text-dark>Agent 1</td>
                                <td>14/01/2024</td>
                                <td>12h45</td>
                                <td>8000FCFA</td>
                                <td>2020</td>
                            </tr>
                        </tbody>
                      </table>
                      
                    </div>

                    <!-- FIN MODIFICATION -->
                    <!-- FIN MODIFICATION -->
                    <!-- FIN MODIFICATION -->

                    
                    <div class="tab-pane fade pt-3" id="eligibilité">
                      
                    <!-- Attribuer une carte au compte -->

                    <div class="card">
                        <div class="card-body pt-5">

                            <div class="" style="font-weight: bold; color: gray;"> 

                              <div class="row">
                                <div class="label ">Ancienneté du mutualiste: <label for="" class="text-dark">3 ans</label></div>
                              </div> <br>

                              <div class="row">
                                <div class="label">Assurance décès: <label for="" class="text-success">Eligible</label></div>
                              </div> <br>

                              <div class="row">
                                <div class="label">Assurance santé : <label for="" class="text-success">ELigible</label></div>
                              </div> <br>

                              <div class="row">
                                <div class="label">Assurance mariage : <label for="" class="text-danger">Non éligible</label></div>
                              </div> <br>

                              <div class="row">
                                <div class="label">Assurance juridique : <label for="" class="text-success">Eligible</label></div>
                              </div> <br>

                            </div>
                        </div>
                      </div>

                      <!-- Fin Attribuer une carte au compte -->

                    </div>

                    <div class="tab-pane fade pt-3" id="assistances">

                      <table class="table datatable">
                          <thead>
                            <tr>
                              <th class="align-middle">Nom de l'agent</th>
                              <th class="align-middle">Type d'assistance</th>
                              <th class="align-middle">Date</th>
                            </tr>
                          </thead>
                          <tbody>
                              <tr>
                                  <td class="align-middle">Agent 1</td>
                                  <td class="align-middle">Assurance santé</td>
                                  <td class="align-middle">18/01/2024</td>
                              </tr>
                          </tbody>
                      </table>

                    </div>

                    <!-- FIN MODIFICATION -->
                    <!-- FIN MODIFICATION -->
                    <!-- FIN MODIFICATION -->

                  </div>
                </div>

              </div>
            </div>

          </div>
        </div>
      </section>

</x-layouts>
