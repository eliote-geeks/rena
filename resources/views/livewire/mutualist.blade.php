<section class="section profile">
    <div class="row">
        <div class="col-xl-9">

            <div class="card">
                <div class="card-body pt-3">
                    <div class="tab-content pt-2">
                        @if ($create == 'on')
    
                        <!-- Menu de navigation -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link {{ $status1 == 'show active' ? 'active' : '' }}" wire:click='fillForm'>Remplir
                                    les informations</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link {{ $status2 == 'show active' ? 'active' : '' }}" wire:click='confirmInfo'>Confirmer
                                    les informations</button>
                            </li>

                        </ul>  <br>
                        <!-- Fin Menu de navigation -->
                        <div>
                            <button wire:click='changeCreate' class="btn btn-info">List Mutualist</button>
                        </div>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade {{ $status1 }} profile-overview" id="addInfos">
                                <!-- Ajouter les informations du compte -->
                                <div class="" style="font-weight: bold; color: gray;">
                                    <form action="{{ route('searchByCard') }}" method="POST" id="account-form">
                                        @csrf
                                        <div class="centered-div ">
                                            <div class="form-floating mb-3">
                                                <center>
                                                    <div class="spinner-grow text-primary"
                                                        style="width: 7rem; height: 7rem;">
                                                        <span class="visually-hidden">Loading...</span>
                                                    </div>
                                                </center>
                                            </div>
                                            <h1 class="fw-bold text-black">
                                                <center>APPROCHEZ LA CARTE DU MUTUALISTE POUR RECHERCHER SON COMPTE
                                                </center>
                                            </h1>
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control visually-hidden"
                                                    id="floatingInput" placeholder="Password" name="id_card_smart"
                                                    autofocus>
                                                @error('id_card_smart')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <hr class="my-3">
                                            @if (session()->has('message'))
                                                <center><label
                                                        class="text-danger">{{ session()->get('message') }}</label>
                                                </center>
                                            @endif
                                        </div>
                                    </form>

                                    <!-- Fin Ajouter les informations du compte -->

                                </div>
                            </div>

                            <div class="tab-pane fade {{ $status2 }} profile-overview pt-3" id="confirmInfos">
                                <!-- Confirmer les informations du compte -->
                                <div class="" style="font-weight: bold; color: gray;">

                                    <div class="row mb-3">
                                        <label for="profileImage" class="col-md-4 col-lg-4 col-form-label">Photo
                                            du mutualiste</label>
                                        <div class="col-md-8 col-lg-9">
                                            <div class="square overflow-hiddden" style="width: 115px; height:115px;">
                                                <img src="{{ $avatar ? $avatar->temporaryUrl() : 'assets/img/blank_image.jpg' }}"
                                                    class="img-fluid h-100 w-100" id="imgPreview">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="label ">Nom : <label for="" class="text-dark">
                                                {{ $firstName }}
                                            </label></div>
                                    </div>

                                    <div class="row">
                                        <div class="label">Prenom : <label for=""
                                                class="text-dark">{{ $lastName }}</label></div>
                                    </div>

                                    <div class="row">
                                        <div class="label">Sexe : <label for=""
                                                class="text-dark">{{ $sex }}</label></div>
                                    </div>

                                    <div class="row">
                                        <div class="label">Pays de résidence : <label for=""
                                                class="text-dark">{{ $country }}</label></div>
                                    </div>

                                    <div class="row">
                                        <div class="label">Numero de téléphone : <label for=""
                                                class="text-dark">{{ $phone }}</label></div>
                                    </div>

                                    <div class="row">
                                        <div class="label">Date de naissance : <label for=""
                                                class="text-dark">{{ \Carbon\Carbon::parse($birth)->format('d M, Y') }}</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="label">Lieu de naissance : <label for=""
                                                class="text-dark">{{ $placeBirth }}</label></div>
                                    </div>

                                    <div class="row">
                                        <div class="label">Profession : <label for=""
                                                class="text-dark">{{ $profession }}</label></div>
                                    </div>

                                    <div class="row">
                                        <div class="label">Lieu de résidence : <label for=""
                                                class="text-dark">{{ $residence }}</label></div>
                                    </div>

                                    <div class="row">
                                        <div class="label">Point de repère : <label for=""
                                                class="text-dark">{{ $repere }}</label></div>
                                    </div>

                                    <div class="row">
                                        <div class="label">Type de pièce d'identification : <label for=""
                                                class="text-dark">{{ $identificationType }}</label></div>
                                    </div>

                                    <div class="row">
                                        <div class="label">N° pièce d'identification : <label for=""
                                                class="text-dark">{{ $identification }}</label></div>
                                    </div>

                                    <div class="row">
                                        <div class=" label">Date de délivrance pièce d'identification : <label
                                                for=""
                                                class="text-dark">{{ \Carbon\Carbon::parse($dateDelivryPiece)->format('d M, Y') }}</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="label">Lieu de délivrance : <label for=""
                                                class="text-dark">{{ $placeDelivryPiece }}</label></div>
                                    </div>

                                    <div class="row">
                                        <div class="label">Situation Matrimoniale : <label for=""
                                                class="text-dark">{{ $matrimonialStatus }}</label></div>
                                    </div>

                                    <div class="row">
                                        <div class="label">Nom du bénéficiaire en cas de décès : <label
                                                for="" class="text-dark">{{ $beneficary }}</label></div>
                                    </div>

                                    @foreach ($secondaryInsureds as $index => $insured)
                                        <div class="row">
                                            <div class="label">Assuré secondaire N°{{ $index + 1 }} : <label
                                                    for=""
                                                    class="text-dark">{{ $secondaryInsureds[$index] }}</label></div>
                                        </div>
                                    @endforeach


                                    <div class="d-flex justify-content-between my-5">
                                        <button type="button" class="btn btn-secondary" wire:click='fillForm' wire:loading.attr='disabled'>Précédent</button>
                                        <button type="button"  class="btn btn-primary" wire:loading.attr='disabled' wire:click='save'>Suivant</button>
                                    </div>
                                    
                                </div>
                                <!-- Fin Confirmer les informations du compte -->
                            </div>

                        </div>

                        <!-- Fin Attribuer une carte au compte -->


@else
{{-- liste  --}}
<div>
    <button wire:click='changeCreate' class="btn btn-sm btn-info">Create a Mutualist</button>
</div>

    <table class="table datatable">
        <thead>
            <tr>
                <th>Nom Complet</th>
                <th>Adresse</th>
                <th>Sexe</th>
                <th>n° Card</th>
                <th>Montant Total Cotisation</th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mutualists as $mutual)
                <tr>
                    <td class="text-dark"><a href="{{ route('mutualist.show',$mutual) }}">{{ \Str::limit($mutual->first.' '.$mutual->last,20) }}</a></td>
                    <td>{{ $mutual->phone }}</td>
                    <td>{{ $mutual->sex }}</td>
                    <td>{{ $mutual->id_card_smart }}</td>
                    <td>2020</td>
                    <td>
                        <div class="d-flex">
                            <button class="btn btn-sm btn-warning me-2">Editer</button>
                            {{-- <button class="btn btn-sm btn-danger">voir</button> --}}
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

                        {{-- fin liste --}}  
@endif


                    </div>

                </div>

            </div>

        </div>
    </div>

    </div>
    </div>
    <script>
        function updatePhonePrefix() {
            const countrySelect = document.getElementById('pays');
            const phoneInput = document.getElementById('numero');
            const countryPrefixMap = {
                'Cameroun': '+237',
                'Côte d\'Ivoire': '+225',
                'Russie': '+7',
                'Canada': '+1',
                'United Kingdom': '+44',
                'France': '+33',
                'Germany': '+49'
            };

            const selectedCountry = countrySelect.value;
            const prefix = countryPrefixMap[selectedCountry] || '';

            if (prefix) {
                phoneInput.value = prefix + ' ' + phoneInput.value.replace(/^\+\d+\s*/, '');
            } else {
                phoneInput.value = phoneInput.value.replace(/^\+\d+\s*/, '');
            }
        }
    </script>
</section>
