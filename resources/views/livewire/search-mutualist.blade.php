<section class="section profile">
    <div class="row">

        <div class="col-xl-11">

            <div class="card">
                <div class="card-body pt-3">
                    <div class="tab-content pt-2">

                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <a  class="nav-link " href='{{ route('search-by-Cart') }}'>Recherche
                                    avec la carte</a>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link active" href='{{ route('searchMutualist') }}'>Recherche
                                </button>
                            </li>


                        </ul>

                       
                        <div class="tab-pane fade show active  profile-overview pt-3" id="searchNom">
                            <!-- Confirm_information -->
                            <div class="text-center">
                                <form action="#" method="post">
                                    <div class="input-group" style="padding: 100px;">
                                     
                                        <input type="text" wire:model.live='search'
                                            class="form-control rounded-start" placeholder="Entrez quelque chose..."
                                            aria-label="Rechercher" aria-describedby="button-search" name="nomSearch">
                                           
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
                <th class="align-middle">Telephone</th>
                <th class="align-middle">N° Identification</th>
                <th class="align-middle">Selectionner</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($mutualists as $mutual)
                <tr>
                    <td class="align-middle">{{ $mutual->first }}</td>
                    <td class="align-middle">{{ $mutual->last }}</td>
                    <td class="align-middle">{{ $mutual->phone }}</td>
                    <td class="align-middle">{{ $mutual->num_identification }}</td>
                    <td class="text-center">
                        <form action="javascript:;" method="post">
                            <a class="btn btn-outline-success rounded-end" href="{{ route('mutualist.show', $mutual) }}"
                                id="button-search">
                                <i class="bi bi-check-lg fs-8"></i>
                            </a>
                        </form>
                    </td>
                </tr>
            @empty
                <span>not found</span>
            @endforelse
        </tbody>
    </table>
   
    </div>
</section>
