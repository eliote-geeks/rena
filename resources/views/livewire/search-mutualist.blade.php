<section class="section profile">
    <div class="row">

        <div class="col-xl-11">

            <div class="card">
                <div class="card-body pt-3">
                    <div class="tab-content pt-2">

                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab"
                                    data-bs-target="#searchCarte">Recherche avec la carte</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#searchNom">Recherche
                                    avec le nom</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab"
                                    data-bs-target="#searchMatricule">Recherche avec le matricule</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#searchNumero">Recherche
                                    avec le numéro</button>
                            </li>

                        </ul>

                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="searchCarte">
                                <div class="" style="font-weight: bold; color: gray;">

                                    <!-- Recherche avec la carte -->
                                    <form action="#" method="post" id="account-form">

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
                                                    id="floatingInput" placeholder="Password" name="id_carte" autofocus>
                                            </div>
                                            <hr class="my-3">
                                            <center><label class="text-danger">Erreur</label></center>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade profile-overview pt-3" id="searchNom">
                            <!-- Confirm_information -->


                            <div class="text-center">
                                <form action="#" method="post">
                                    <div class="input-group" style="padding: 100px;">
                                        <input type="text" class="form-control rounded-start"
                                            placeholder="Entrez le nom du mutualiste..." aria-label="Rechercher"
                                            aria-describedby="button-search" name="nomSearch">
                                        <button class="btn btn-outline-secondary rounded-end" type="submit"
                                            id="button-search">
                                            <i class="bi bi-search"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>

                        </div>

                        <div class="tab-pane fade pt-3" id="searchMatricule">
                            <!-- profile-settings -->
                            <div class="text-center">
                                <form action="#" method="post">
                                    <div class="input-group" style="padding: 100px;">
                                        <input type="text" class="form-control rounded-start"
                                            placeholder="Entrez le matricule du mutualiste..." aria-label="Rechercher"
                                            aria-describedby="button-search" name="matriculeSearch">
                                        <button class="btn btn-outline-secondary rounded-end" type="submit"
                                            id="button-search">
                                            <i class="bi bi-search"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>

                        </div>

                        <div class="tab-pane fade pt-3" id="searchNumero">
                            <div class="text-center">
                                <form action="#" method="post">
                                    <div class="input-group" style="padding: 100px;">
                                        <input type="text" class="form-control rounded-start"
                                            placeholder="Entrez le numéro de téléphone du mutualiste..."
                                            aria-label="Rechercher" aria-describedby="button-search"
                                            name="numeroSearch">
                                        <button class="btn btn-outline-secondary rounded-end" type="submit"
                                            id="button-search">
                                            <i class="bi bi-search"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div><!-- End Bordered Tabs -->

                </div><!-- End Bordered Tabs -->

            </div>
        </div>

    </div>
    </div>
    <div class="row mb-3" style="font-weight: bold; color: black;">
        <label for="fullName" class="col-md-4 col-lg-6 col-form-label">Selectionnez le compte</label>
    </div>
    <!-- Table with stripped rows -->
    <table class="table datatable">
        <thead>
            <tr>
                <th class="align-middle">Nom du mutualiste</th>
                <th class="align-middle">Prenom du mutualiste</th>
                <th class="align-middle">Matricule</th>
                <th class="align-middle">Numero de téléphone</th>
                <th class="align-middle">Selectionner</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="align-middle">Nom client 1</td>
                <td class="align-middle">Prenom client1</td>
                <td class="align-middle">45HDTYS00056NK</td>
                <td class="align-middle">+237 65821586</td>
                <td class="text-center">
                    <form action="#" method="post">
                        <button class="btn btn-outline-success rounded-end" type="submit" id="button-search">
                            <i class="bi bi-check-lg fs-8"></i>
                        </button>
                    </form>
                </td>
            </tr>
            <tr>
                <td class="align-middle">Nom client 2</td>
                <td class="align-middle">Prenom client 2</td>
                <td class="align-middle">45HDTYS00056NK</td>
                <td class="align-middle">+237 658564586</td>
                <td class="text-center">
                    <form action="#" method="post">
                        <button class="btn btn-outline-success rounded-end" type="submit" id="button-search">
                            <i class="bi bi-check-lg fs-8"></i>
                        </button>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
    </div>
</section>

