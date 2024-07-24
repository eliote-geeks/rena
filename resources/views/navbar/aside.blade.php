<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <!-- ======= DEBUT INFORMATICIEN ======= -->
        <!-- ======= DEBUT INFORMATICIEN ======= -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#utilisateurs-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-person-fill fs-5"></i><span>Gestion des utilisateurs</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="utilisateurs-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('usersList') }}">
                        <i class="bi bi-journal-text fs-5"></i><span>Liste</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('create-user') }}">
                        <i class="bi bi-person-plus fs-5"></i><span>Créer un compte</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="requêtes.php">
                <i class="bi bi-hourglass-top fs-5"></i>
                <span>Requêtes</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('amountYear.index') }}">
                <i class="bi bi-gear fs-5"></i>
                <span>Paramètres</span>
            </a>
        </li>

        <!-- ======= FIN INFORMATICIEN ======= -->
        <!-- ======= FIN INFORMATICIEN ======= -->

        <!-- ======= DEBUT COMPTABLE ======= -->
        <!-- ======= DEBUT COMPTABLE ======= -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#mutualiste-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-person-fill fs-5"></i><span>Mutualistes</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="mutualiste-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('mutualist.create') }}">
                        <i class="bi bi-person-plus fs-6"></i><span>Créer un compte</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('cotisationCard') }}">
                        <i class="bi bi-coin fs-6"></i><span>Ajouter une cotisation</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('search-by-Cart') }}">
                        <i class="bi bi-search fs-6"></i><span>Recherche</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#historique-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text fs-5"></i><span>Historique</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="historique-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="transactions-journée.php">
                        <i class="bi bi-currency-exchange fs-6"></i><span>Transactions de la journée</span>
                    </a>
                </li>
                <li>
                    <a href="historique-cotisation.php">
                        <i class="bi bi-journal-text fs-6"></i><span>Cotisations des mutualistes</span>
                    </a>
                </li>
                <li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('closeYearAmount') }}">
                <i class="bi bi-x-circle fs-6"></i>
                <span>Cloturer l'année</span>
            </a>
        </li>

        <!-- ======= FIN COMPTABLE ======= -->
        <!-- ======= FIN COMPTABLE ======= -->


        <!-- ======= DEBUT OPERATEUR ======= -->
        <!-- ======= DEBUT OPERATEUR ======= -->

        <li class="nav-item active">
            <a class="nav-link collapsed" href="verification-eligibilité">
                <i class="bi bi-check-circle fs-6"></i>
                <span>Eligibilité</span>
            </a>
        </li>

        <!-- ======= FIN OPERATEUR ======= -->
        <!-- ======= FIN OPERATEUR ======= -->


        <!-- ======= DEBUT COMMERCIAL ======= -->
        <!-- ======= DEBUT COMMERCIAL ======= -->

       
        <!-- ======= FIN COMMERCIAL ======= -->
        <!-- ======= FIN COMMERCIAL ======= -->
    </ul>
</aside>
<!-- End Sidebar-->
