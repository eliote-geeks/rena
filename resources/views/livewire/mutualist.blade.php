<section class="section profile">
    <div class="row">
        <div class="col-xl-9">

            <div class="card">
                <div class="card-body pt-3">
                    <div class="tab-content pt-2">
                        @if ($create == 'on')

                            <!-- Menu de navigation -->
                            <ul class="nav nav-tabs nav-tabs-bordered">

                                <li class="nav-item visually-hidden">
                                    <button class="nav-link {{ $status1 == 'show active' ? 'active' : '' }}"
                                        wire:click='fillForm'>Remplir
                                        les informations</button>
                                </li>

                                <li class="nav-item visually-hidden">
                                    <button class="nav-link {{ $status2 == 'show active' ? 'active' : '' }}"
                                        wire:click='confirmInfo'>Confirmer
                                        les informations</button>
                                </li>

                            </ul> <br>
                            <!-- Fin Menu de navigation -->
                            <div>
                                <button wire:click='changeCreate' class="btn btn-info">Liste des comptes mutualistes</button>
                            </div>
                            <div class="tab-content pt-2">

                                <div class="tab-pane fade {{ $status1 }} profile-overview" id="addInfos">
                                    <!-- Ajouter les informations du compte -->
                                    <div class="" style="font-weight: bold; color: gray;">
                                        <form action="#" method="post" id="account-form">
                                            <div class="row mb-3">
                                                <label for="profileImage" class="col-md-4 col-lg-4 col-form-label">Photo
                                                    du mutualiste</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <div class="square overflow-hiddden"
                                                        style="width: 115px; height:115px;">

                                                        @if ($edit)
                                                        <img src="{{ \App\Models\User::findOrFail(\App\Models\Mutualist::findOrFail($this->edit)->user_id)->profile_photo_url }}"
                                                        class="img-fluid h-100 w-100" id="imgPreview">
                                                        @else
                                                            <img src="{{ $avatar ? $avatar->temporaryUrl() : 'assets/img/blank_image.jpg' }}"
                                                                class="img-fluid h-100 w-100" id="imgPreview">
                                                        @endif
                                                    </div>
                                                    <div class="pt-2">
                                                        <input type="file" wire:model.live='avatar'
                                                            id="imgMutualiste" class="d-none" accept="image/*">
                                                        <label for="imgMutualiste" class="btn btn-primary btn-sm"
                                                            title="Upload new profile image"><i
                                                                class="bi bi-upload"></i></a>
                                                    </div>
                                                    @error('avatar')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nom
                                                    :</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input wire:model.live='firstName' type="text"
                                                        class="form-control" id="nom"
                                                        placeholder="Entrez le nom complet du mutualiste" required>
                                                    @error('firstName')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Prénom
                                                    :</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input wire:model.live='lastName' type="text"
                                                        class="form-control" id="prenom"
                                                        placeholder="Entrez le prénom du mutualiste" required>
                                                    @error('lastName')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Sexe
                                                    :</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <select wire:model.live='sex' type="text" class="form-control"
                                                        id="sexe" required>
                                                        <option value="">Selectionnez le sexe</option>
                                                        <option>Masculin</option>
                                                        <option>Féminin</option>
                                                    </select>
                                                    @error('sex')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class="row mb-3">
                                                <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Pays de
                                                    résidence:</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <select wire:model.live='country' type="text"
                                                        class="form-control" id="pays"
                                                        onchange="updatePhonePrefix()" required>
                                                        <option value="">Selectionnez le pays de résidence
                                                        </option>
                                                        <option value="Cameroun">Cameroun</option>
                                                        <option value="Côte d'Ivoire">Côte d'Ivoire</option>
                                                        <option value="Russie">Russie</option>
                                                        <option value="Canada">Canada</option>
                                                        <option value="United Kingdom">United Kingdom</option>
                                                        <option value="France">France</option>
                                                        <option value="Germany">Germany</option>
                                                    </select>
                                                    @error('country')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="fullName" class="col-md-3 col-lg-3 col-form-label">Numéro de
                                                    téléphone :</label>
                                                <div class="col-md-9 col-lg-9">
                                                    <input wire:model.live='phone' type="text" class="form-control"
                                                        id="numero"
                                                        placeholder="Entrez le numéro de téléphone du mutualiste"
                                                        type="number" required>
                                                    @error('phone')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Date de
                                                    naissance :</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input wire:model.live='birth' type="date"
                                                        class="form-control" id="dateNaissance" required>
                                                    @error('birth')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Lieu de
                                                    naissance :</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input wire:model.live='placeBirth' type="text"
                                                        class="form-control" id="lieuNaissance"
                                                        placeholder="Entrez le lieu de naissance du mutualiste"
                                                        required>
                                                    @error('placeBirth')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="fullName"
                                                    class="col-md-4 col-lg-3 col-form-label">Profession :</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input wire:model.live='profession' type="text"
                                                        class="form-control" id="profession"
                                                        placeholder="Entrez la profession du mutualiste" required>
                                                    @error('profession')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Lieu de
                                                    résidence :</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input wire:model.live='residence' type="text"
                                                        class="form-control" id="lieuResidence"
                                                        placeholder="Entrez le lieu de résidence du mutualiste"
                                                        required>
                                                    @error('residence')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Point
                                                    de repère :</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input wire:model.live='repere' type="text"
                                                        class="form-control" id="repère"
                                                        placeholder="Entrez le point de repère du lieu de résidence"
                                                        required>
                                                    @error('repere')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Type de
                                                    pièce d'identification :</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <select wire:model.live='identificationType' type="text"
                                                        class="form-control" id="typePiece" required>
                                                        <option value="">Veuillez sélectionner le type de pièce
                                                            d'identification</option>
                                                        <option>CNI</option>
                                                        <option>Récépissé</option>
                                                        <option>Passport</option>
                                                        <option>Carte de séjour</option>
                                                        <option>Carte de réfugié</option>
                                                    </select>
                                                    @error('identificationType')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="fullName" class="col-md-3 col-lg-3 col-form-label">N°
                                                    pièce d'identification :</label>
                                                <div class="col-md-9 col-lg-9">
                                                    <input wire:model.live='identification' type="text"
                                                        class="form-control" id="numeroPiece" type="number"
                                                        placeholder="Entrez le numéro de la pièce d'identification"
                                                        pattern="[0-9]*"
                                                        oninput="this.value = this.value.replace(/[^0-9]/g, '');"
                                                        required>
                                                    @error('identification')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Date
                                                    délivrance pièce d'identification :</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input wire:model.live='dateDelivryPiece' type="date"
                                                        class="form-control" id="dateDelivrancePiece" required>
                                                    @error('dateDelivryPiece')
                                                        <smal class="text-danger">{{ $message }}</smal>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="fullName"
                                                    class="col-md-4 col-lg-3 col-form-label">Situation matrimoniale
                                                    :</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <select wire:model.live='matrimonialStatus' type="text"
                                                        class="form-control" id="situationMatrimoniale" required>
                                                        <option value="">Veuillez sélectionner la situation
                                                            matrimoniale</option>
                                                        <option>Célibataire</option>
                                                        <option>Marié(e)</option>
                                                        <option>Veuf/Veuve</option>
                                                    </select>
                                                    @error('matrimonialStatus')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nom
                                                    complet du bénéficiaire en cas de décès :</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input wire:model.live='beneficary' type="text"
                                                        class="form-control" id="beneficiaireDécès"
                                                        placeholder="Entez le nom du bénéficiare en cas de décès"
                                                        required>
                                                    @error('beneficary')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div>
                                                @foreach ($secondaryInsureds as $index => $insured)
                                                    <div class="row mb-3">
                                                        <label for="secondaryInsured{{ $index }}"
                                                            class="col-md-4 col-lg-3 col-form-label">Nom de l'assuré
                                                            secondaire {{ $index + 1 }} :</label>
                                                        <div class="col-md-8 col-lg-9">
                                                            <input wire:model="secondaryInsureds.{{ $index }}"
                                                                type="text" class="form-control"
                                                                id="secondaryInsured{{ $index }}"
                                                                placeholder="Entrez le nom de l'assuré secondaire N°{{ $index + 1 }}"
                                                                required>
                                                            <br>
                                                            <div class="icon" style="margin-top: 15px;">
                                                                <i class="bi bi-trash text-danger"
                                                                    style="cursor: pointer;"
                                                                    wire:click="removeSecondaryInsured({{ $index }})">Supprimer</i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach

                                                <div class="row mb-3">
                                                    <div class="col-md-12">
                                                        <i class="bi bi-plus-circle-fill text-success"
                                                            style="cursor: pointer;" wire:click="addSecondaryInsured">
                                                            Ajouter un assuré secondaire</i>
                                                    </div>
                                                </div>


                                            </div>


                                            <div class="text-center">
                                                <button type="button" wire:loading.attr='disabled'
                                                    wire:click='confirmInfo' class="btn btn-primary">Suivant</button>
                                            </div>
                                        </form>
                                        <!-- Fin Ajouter les informations du compte -->
                                    </div>
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
                                                @if ($edit)
                                                <img src="{{ \App\Models\User::findOrFail(\App\Models\Mutualist::findOrFail($this->edit)->user_id)->profile_photo_url }}"
                                                class="img-fluid h-100 w-100" id="imgPreview">
                                                @else
                                                    <img src="{{ $avatar ? $avatar->temporaryUrl() : 'assets/img/blank_image.jpg' }}"
                                                        class="img-fluid h-100 w-100" id="imgPreview">
                                                @endif

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
                                        <button type="button" class="btn btn-secondary" wire:click='fillForm'
                                            wire:loading.attr='disabled'>Précédent</button>
                                        <button type="button" class="btn btn-primary" wire:loading.attr='disabled'
                                            wire:click='save'>Suivant</button>
                                    </div>

                                </div>
                                <!-- Fin Confirmer les informations du compte -->
                            </div>

                    </div>

                    <!-- Fin Attribuer une carte au compte -->
                @else
                    {{-- liste  --}}
                    <div>
                        <button wire:click='changeCreate' class="btn btn-sm btn-info">Créer un compte mutualiste</button>
                    </div>

                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>Nom Complet</th>
                                <th>Adresse</th>
                                <th>Sexe</th>
                                <th>n° Identification</th>
                                {{-- <th>Montant Total Cotisation</th> --}}
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mutualists as $mutual)
                                <tr>
                                    <td class="text-dark"><a
                                            href="{{ route('mutualist.show', $mutual) }}">{{ \Str::limit($mutual->first . ' ' . $mutual->last, 20) }}</a>
                                    </td>
                                    <td>{{ $mutual->phone }}</td>
                                    <td>{{ $mutual->sex }}</td>
                                    <td>{{ $mutual->num_identification }}</td>
                                    {{-- <td>2020</td> --}}
                                    <td>
                                        <div class="d-flex">
                                            <button wire:click='editUserProfile({{ $mutual->id }})'
                                                class="btn btn-sm btn-warning me-2">Editer</button>
                                            <button wire:click='editCard({{ $mutual->id }})'
                                                class="btn btn-sm btn-danger">Nouvelle Carte </button>
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
