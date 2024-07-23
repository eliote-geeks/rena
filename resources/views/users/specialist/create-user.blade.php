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
                        <form action="{{ route('newUser') }}" method="post" id="account-form">     
                            @csrf                  
  
                          <div class="row mb-3">
                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nom complet :</label>
                            <div class="col-md-8 col-lg-9">
                              <input name="name" type="text" class="form-control" id="nomUtilisateur" placeholder="Entrez le nom complet de l'utilisateur" required>
                              @error('name')
                                  <small class="text-danger">{{ $message }}</small>
                              @enderror
                            </div>
                          </div>
  
                          <div class="row mb-3">
                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Login :</label>
                            <div class="col-md-6 col-lg-7">
                              <input type="email" name="email" class="form-control" id="loginUtilisateur" placeholder="Entrez le login de l'utilisateur" required>
                              @error('email')
                              <small class="text-danger">{{ $message }}</small>
                          @enderror
                            </div>
                          </div>
  
                          <div class="row mb-3">
                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Mot de passe :</label>
                            <div class="col-md-8 col-lg-9">
                              <input name="password" type="password" class="form-control" id="pwdUtilisateur" placeholder="Entrez le mot de passe de l'utilisateur">
                              @error('password')
                              <small class="text-danger">{{ $message }}</small>
                          @enderror
                            </div>
                          </div>
  
                          <div class="row mb-3">
                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Type de compte :</label>
                            <div class="col-md-8 col-lg-9">
                              <select name="user_type" type="text" class="form-control" required>
                                <option value="App\Models\Accountant">Comptable</option>
                                <option value="App\Models\Salestore">Commercial</option>
                                <option value="App\Models\Specialist">Informaticien</option>
                                <option value="App\Models\Operator">Opérateur</option>
                              </select>
                              @error('user_type')
                              <small class="text-danger">{{ $message }}</small>
                          @enderror
                            </div>
                          </div>
  
                          <div class="row mb-3">
                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Poste :</label>
                            <div class="col-md-8 col-lg-9">
                              <input name="poste" type="text" class="form-control" id="posteUtilisateur" placeholder="Entrez le poste de l'utilisateur" required>
                              @error('poste')
                              <small class="text-danger">{{ $message }}</small>
                          @enderror
                            </div>
                          </div>
  
                       
                          <div class="text-center">
                            <button type="submit" class="btn btn-primary">Creer</button>
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
