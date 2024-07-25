<x-layouts>
    <base href="/">

    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Paramètres</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">

            <div class="col-xl-10">

                <div class="card">
                    <div class="card-body pt-3">
                        <div class="tab-content pt-2">

                            <!-- Menu de navigation -->
                            <ul class="nav nav-tabs nav-tabs-bordered">

                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab"
                                        data-bs-target="#addInfos">Année mutualiste</button>
                                </li>


                            </ul>
                            <!-- Fin Menu de navigation -->

                            <div class="tab-content pt-2">

                                <div class="tab-pane fade show active profile-overview" id="addInfos">

                                    <!-- Ajouter les informations du compte -->
                                    <div class="row mb-3" style="font-weight: bold; font-size:18px;">
                                        <label for="fullName" class="col-form-label">Définir la période de l'année des
                                            cotisations</label>
                                            
      
                                    </div>
                                    <div class="" style="font-weight: bold; color: gray;">
                                        <form action="{{ route('amountYear.store') }}" method="POST" id="account-form">
                                            @csrf

                                            <div class="row mb-3">
                                                <div
                                                    class="form-group 
                                                
                                                row">
                                                    <label for="input1" class="col-sm-5 col-form-label">Montant annuel
                                                        des cotisations en FCFA :</label>
                                                    <div class="col-sm-6">
                                                        <input type="number" class="form-control"
                                                            id="montantCotisations" value="26000"
                                                            placeholder="Entrez le montant annuel des cotisations"
                                                            name="amount" >
                                                            @error('amount')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary">Valider</button>
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
    </section>

</x-layouts>
