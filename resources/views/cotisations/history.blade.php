<x-layouts>
    <base href="/">

    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Historique</a></li>
                <li class="breadcrumb-item active">Transactions de la journée</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body"> <br>
                        <div class="row mb-3" style="font-weight: bold; color: black;">
                            <label for="fullName" class="col-md-4 col-lg-6 col-form-label">Montant total des cotisations
                                : {{ number_format(\App\Models\Transaction::where('status',1)->sum('amount')) }}FCFA </label>
                            <div class="d-flex justify-content-end p-3">
                                <form action="#" method="post">
                                    <button type="submit" class="btn btn-primary" name="ouvertureJournée">Ouvrir la
                                        journée</button>
                                    <button type="submit" class="btn btn-primary" name="clotureJournée">Cloturer la
                                        journée</button>
                                </form>
                            </div>
                        </div>
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>Nom du mutualiste</th>
                                    <th>Matricule</th>
                                    <th>Date du paiement</th>
                                    <th>Montant de la cotisation</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transactions as $t)
                                    <tr>
                                        <td>{{ $t->mutualist->first }} </td>
                                        <td>{{ $t->mutualist->num_identification }}</td>
                                        <td>{{ \Carbon\Carbon::parse($t->created_at)->format('d, M Y') }}</td>
                                        <td>{{ number_format($t->amount) }} FCFA</td>
                                        <td class="align-middle text-center">
                                            <form action="javascript:;" method="post">
                                                <button class="btn btn-outline-success rounded-end" type="button"
                                                    id="button-search" data-bs-toggle="modal"
                                                    data-bs-target="#editerCotisation{{ $t->id }}">
                                                    <i class="bi bi-pencil"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="editerCotisation{{ $t->id }}" tabindex="-1"
                                        aria-labelledby="editerCotisation-label" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg"
                                            style="max-width: 60%;">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editerCotisation-label">Modifier le
                                                        montant de la cotisation</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="card">
                                                        <div class="card-body pt-3">
                                                         
                                                            <div class="row mb-3"
                                                                style="font-weight: bold; color: gray;">
                                                                <label for="fullName" class="col-form-label">Editer la
                                                                    cotisation de {{ $t->mutualist->first }}</label>
                                                            </div>
                                                            <div class="tab-content pt-2">

                                                                <div class=""
                                                                    style="font-weight: bold; color: gray;">

                                                                    <!-- Profile Edit Form -->
                                                                    <form action="{{ route('editTransaction',$t) }}" method="post"
                                                                        id="account-form">
                                                                            @csrf
                                                                        <div class="row mb-3">
                                                                            <label for="fullName"
                                                                                class="col-md-4 col-lg-5 col-form-label">Nouveau Montant
                                                                                de la cotisation en FCFA :</label>
                                                                            <div class="col-md-8 col-lg-6">
                                                                                <input type="number"
                                                                                    class="form-control"
                                                                                    id="montantCotisation"
                                                                                    placeholder="Entrez le montant de la cotisation"
                                                                                    name="amount" value="{{ $t->amount }}"
                                                                                    required>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row mb-3">
                                                                            <label for="fullName"
                                                                                class="col-md-4 col-lg-5 col-form-label">Justification
                                                                                :</label>
                                                                            <div class="col-md-8 col-lg-6">
                                                                                <textarea name="content"  class="form-control" id="justificationEdit"
                                                                                    placeholder="Entrez une justification de la modification" name="justificationEdit" value="1000" required></textarea>
                                                                            </div>
                                                                        </div>

                                                                        <div class="text-center">
                                                                            <button type="submit"
                                                                                class="btn btn-primary">Valider</button>
                                                                        </div>
                                                                    </form><!-- End Profile Edit Form -->

                                                                </div>

                                                            </div><!-- End Bordered Tabs -->

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
