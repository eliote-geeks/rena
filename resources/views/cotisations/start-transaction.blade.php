<x-layouts>
    <base href="/">

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
                  {{-- <label for="fullName" class="col-md-4 col-lg-6 col-form-label">Solde du compte : 20000FCFA </label> --}}
                  {{-- <label for="fullName" class="col-md-8 col-lg-6 col-form-label">Reste à cotiser : 6000FCFA</label>                  --}}
                </div>
                <div class="row mb-3" style="font-weight: bold; color: gray;">
                  <label for="fullName" class="col-form-label">Ajouter une cotisation au solde de <b>{{ $mutual->first.' '.$mutual->last }}</b></label>                
                </div>
                <div class="tab-content pt-2">
  
                  <div class="" style="font-weight: bold; color: gray;">
  
                    <!-- Profile Edit Form -->
                    <form action="{{ route('addTransaction',$mutual) }}" method="post" id="account-form">
                                @csrf
                      <div class="row mb-3">
                        <label for="fullName" class="col-md-4 col-lg-5 col-form-label">Montant de la cotisation en FCFA :</label>
                        <div class="col-md-8 col-lg-6">
                          <input type="text" class="form-control" id="montantCotisation" placeholder="Entrez le montant de la cotisation" name="amount" required>
                          @error('amount')
                              <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                      </div>
  
                      <div class="text-center">
                        <button type="submit" class="btn btn-primary">Valider</button>
                      </div>
                    </form><!-- End Profile Edit Form -->
  
                  </div>
  
                </div><!-- End Bordered Tabs -->
  
              </div>
            </div>
  
          </div>
        </div>
      </section>
  
</x-layouts>