<x-layouts>
    <base href="/">


    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Gestion des utilisateurs</li>
                <li class="breadcrumb-item active">Liste</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body"> <br>
                        <div class="row mb-3" style="font-weight: bold; color: black;">
                            <label for="fullName" class="col-form-label">Liste des utilisateurs </label>
                        </div>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th class="align-middle">Nom complet</th>
                                    <th class="align-middle">Login</th>
                                    <th class="align-middle">Type de compte</th>
                                    <th class="align-middle">Poste</th>
                                    <th class="align-middle">Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="align-middle">{{ $user->name }}</td>
                                        <td class="align-middle">{{ $user->email }}</td>
                                        <td class="align-middle">
                                            @switch($user->user_type)
                                                @case('App\Models\Accountant')
                                                    Comptable
                                                @break

                                                @case('App\Models\Specialist')
                                                    Informaticien
                                                @break

                                                @case('App\Models\Salestore')
                                                    Commercial
                                                @break

                                                @case('App\Models\Operator')
                                                    Operateur
                                                @break

                                                @default
                                            @endswitch

                                        </td>
                                        <td class="align-middle">{{ $user->poste }}</td>
                                        <td class="align-middle text-center">
                                            <form action="#" method="post">
                                                <div class="d-flex justify-content-start">
                                                    <button class="btn btn-outline-success rounded-end"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#preview-modal{{ $user->id }}"
                                                        style="margin-right:2px;" type="button" id="editUser"
                                                        name="editUser">
                                                        <i class="bi bi-pencil fs-6"></i>
                                                    </button>
                                                    <button class="btn btn-outline-danger rounded-end"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#preview-delete{{ $user->id }}"
                                                        style="margin-left:2px;" type="button" id="deleteUser"
                                                        name="deleteUser">
                                                        <i class="bi bi-trash fs-6"></i>
                                                    </button>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>



                                    <div class="modal fade" id="preview-modal{{ $user->id }}" tabindex="-1"
                                        aria-labelledby="preview-modal-label" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg"
                                            style="max-width: 50%;">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="preview-modal-label">Modifier un compte
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="card">
                                                        <div class="card-body pt-5">
                                                            <div class="tab-content pt-4">

                                                                <div class=""
                                                                    style="font-weight: bold; color: gray;">

                                                                    <!-- Profile Edit Form -->
                                                                    <form action="{{ route('editUser', $user) }}"
                                                                        method="post" id="account-form">
                                                                        @csrf
                                                                        <div class="row mb-3">
                                                                            <label for="fullName"
                                                                                class="col-md-4 col-lg-3 col-form-label">Nom
                                                                                complet :</label>
                                                                            <div class="col-md-8 col-lg-9">
                                                                                <input name="name" type="text"
                                                                                    class="form-control" id="nom"
                                                                                    placeholder="Entrez le nom complet de l'utilisateur"
                                                                                    value="{{ $user->name }}"
                                                                                    required>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row mb-3">
                                                                            <label for="fullName"
                                                                                class="col-md-4 col-lg-3 col-form-label">Login
                                                                                :</label>
                                                                            <div class="col-md-6 col-lg-7">
                                                                                <input name="email" type="email"
                                                                                    class="form-control" id="editLogin"
                                                                                    placeholder="Entrez le login de l'utilisateur"
                                                                                    value="{{ $user->email }}"
                                                                                    required>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row mb-3">
                                                                            <label for="fullName"
                                                                                class="col-md-4 col-lg-3 col-form-label">Mot
                                                                                de passe :</label>
                                                                            <div class="col-md-8 col-lg-9">
                                                                                <input name="password" type="password"
                                                                                    class="form-control" id="editpwd"
                                                                                    placeholder="Entrez le mot de passe de l'utilisateur">
                                                                            </div>
                                                                        </div>

                                                                        <div class="row mb-3">
                                                                            <label for="fullName"
                                                                                class="col-md-4 col-lg-3 col-form-label">Type
                                                                                de compte :</label>
                                                                            <div class="col-md-8 col-lg-9">
                                                                                <select name="user_type"
                                                                                    type="text"
                                                                                    class="form-control" required>
                                                                                    <option
                                                                                        value="
                                                                                           @switch($user->user_type)
                                                                                            @case('App\Models\Accountant')
                                                                                                App\Models\Accountant
                                                                                            @break

                                                                                            @case('App\Models\Specialist')
                                                                                                App\Models\Specialist
                                                                                            @break

                                                                                            @case('App\Models\Salestore')
                                                                                                App\Models\Salestore
                                                                                            @break

                                                                                            @case('App\Models\Operator')
                                                                                                App\Models\Operator
                                                                                            @break

                                                                                            @default
                                                                                        @endswitch
                                                                                    
                                                                                    "
                                                                                        selected>
                                                                                        @switch($user->user_type)
                                                                                            @case('App\Models\Accountant')
                                                                                                Comptable
                                                                                            @break

                                                                                            @case('App\Models\Specialist')
                                                                                                Informaticien
                                                                                            @break

                                                                                            @case('App\Models\Salestore')
                                                                                                Commercial
                                                                                            @break

                                                                                            @case('App\Models\Operator')
                                                                                                Operateur
                                                                                            @break

                                                                                            @default
                                                                                        @endswitch


                                                                                    <option
                                                                                        value="App\Models\Accountant">
                                                                                        Comptable</option>
                                                                                    <option
                                                                                        value="App\Models\Salestore">
                                                                                        Commercial</option>
                                                                                    <option
                                                                                        value="App\Models\Specialist">
                                                                                        Informaticien</option>
                                                                                    <option
                                                                                        value="App\Models\Operator">
                                                                                        Opérateur</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row mb-3">
                                                                            <label for="fullName"
                                                                                class="col-md-4 col-lg-3 col-form-label">Poste
                                                                                :</label>
                                                                            <div class="col-md-8 col-lg-9">
                                                                                <input name="poste" type="text"
                                                                                    class="form-control"
                                                                                    id="editPoste"
                                                                                    placeholder="Entrez le poste de l'utilisateur"
                                                                                    value="{{ $user->poste }}"
                                                                                    required>
                                                                            </div>
                                                                        </div>

                                                                        <div class="text-center">
                                                                            <button type="submit"
                                                                                class="btn btn-primary">Modifier</button>
                                                                        </div>

                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="preview-delete{{ $user->id }}" tabindex="-1"
                                        aria-labelledby="preview-modal1-label" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg"
                                            style="max-width: 50%;">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="preview-modal1-label">Supprimer le
                                                        compte <b>{{ $user->name }}</b></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="card">
                                                        <div class="card-body pt-5">
                                                            <div class="tab-content pt-4">

                                                                <div class=""
                                                                    style="font-weight: bold; color: gray;">

                                                                    <!-- Profile Edit Form -->
                                                                    <form action="#" method="post"
                                                                        id="account-form">

                                                                        <div class="centered-div ">
                                                                            <div class="form-floating mb-3">
                                                                                <center>
                                                                                    <i class="bi bi-trash text-danger"
                                                                                        style="font-size: 6rem;"></i>
                                                                                </center>
                                                                            </div>
                                                                            <h1 class="fw-bold text-black">
                                                                                <center>VOULEZ-VOUS VRAIMENT SUPPRIMER
                                                                                    CE COMPTE?</center>
                                                                            </h1>
                                                                            <hr class="my-3">
                                                                            <div class="form-floating mb-3">
                                                                                <center>
                                                                                    <div class="btn-group">
                                                                                        <a href="{{ route('deletetUser', $user) }}"
                                                                                            class="btn btn-danger btn-lg">Oui</a>
                                                                                        <button type="button"
                                                                                            class="btn btn-success btn-lg"
                                                                                            data-bs-dismiss="modal">Non</button>
                                                                                    </div>
                                                                                </center>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>


</x-layouts>
