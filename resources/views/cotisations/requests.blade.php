<x-layouts>
    <base href="/">

    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Requêtes</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body"> <br>
                        <div class="row mb-3" style="font-weight: bold; color: black;">
                            <label for="fullName" class="col-form-label">Approuver ou supprimer des requêtes </label>
                        </div>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th class="align-middle">Nom du mutualiste</th>
                                    <th class="align-middle">Prenom du mutualiste</th>
                                    <th class="align-middle">N° de compte</th>
                                    <th class="align-middle">Heure du paiement</th>
                                    <th class="align-middle text-center">Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transactions as $t)
                                <tr>
                                    <td class="align-middle">{{ $t->mutualist->first }}</td>
                                    <td class="align-middle">{{ $t->mutualist->last }}</td>
                                    <td class="align-middle">{{ $t->mutualist->num_identification }}</td>
                                    <td class="align-middle">{{ \Carbon\Carbon::parse($t->created_at)->format('d, M Y') }}</td>
                                    <td class="align-middle text-center">
                                        <form action="#" method="post">
                                            <div class="d-flex justify-content-start">
                                                <button class="btn btn-outline-secondary rounded-end"
                                                    data-bs-toggle="modal" data-bs-target="#voirPlus{{ $t->id }}"
                                                     type="button" id="voirRequête"
                                                    name="voirRequête">
                                                    <i class="bi bi-eye fs-6"></i>
                                                </button>
                                            </div>
                                        </form>
                                    </td>
                                </tr>

                                <div class="modal fade" id="approuver{{ $t->id }}" tabindex="-1" aria-labelledby="approuver-label" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg" style="max-width: 50%;">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="approuver-label">Approuver la requête</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        <div class="card">
                                            <div class="card-body pt-5">
                                              <div class="tab-content pt-4">
                                
                                                <div class="" style="font-weight: bold; color: gray;">
                                
                                                  <!-- Profile Edit Form -->
                                                  <form action="#" method="post" id="account-form">
                                
                                                    <div class="centered-div ">
                                                      <div class="form-floating mb-3">
                                                        <center>
                                                          <i class="bi bi-check-circle text-success" style="font-size: 6rem;"></i> 
                                                        </center>
                                                      </div>
                                                      <h1 class="fw-bold text-black"><center>VOULEZ-VOUS APPROUVER CETTE REQUÊTE?</center></h1> 
                                                      <hr class="my-3">
                                                      <div class="form-floating mb-3">
                                                        <center>
                                                          <div class="btn-group">
                                                            <a href="{{ route('changeStatus',$t) }}" class="btn btn-success btn-lg">Oui</a>
                                                            <button type="button" class="btn btn-danger btn-lg" data-bs-dismiss="modal">Non</button>
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
                                
                                  <div class="modal fade" id="refuser{{ $t->id }}" tabindex="-1" aria-labelledby="refuser-label" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg" style="max-width: 50%;">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="refuser-label">Refuser la requête</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        <div class="card">
                                            <div class="card-body pt-5">
                                              <div class="tab-content pt-4">
                                
                                                <div class="" style="font-weight: bold; color: gray;">
                                
                                                  <!-- Profile Edit Form -->
                                                  <form action="#" method="post" id="account-form">
                                
                                                    <div class="centered-div ">
                                                      <div class="form-floating mb-3">
                                                        <center>
                                                          <i class="bi bi-trash text-danger" style="font-size: 6rem;"></i> 
                                                        </center>
                                                      </div>
                                                      <h1 class="fw-bold text-black"><center>VOULEZ-VOUS REFUSER CETTE REQUÊTE?</center></h1> 
                                                      <hr class="my-3">
                                                      <div class="form-floating mb-3">
                                                        <center>
                                                          <div class="btn-group">
                                                            <a href="{{ route('deleteStatus',$t) }}" class="btn btn-danger btn-lg">Oui</a>
                                                            <button type="button" class="btn btn-success btn-lg" data-bs-dismiss="modal">Non</button>
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
                                
                                  <div class="modal fade" id="voirPlus{{ $t->id }}" tabindex="-1" aria-labelledby="voirPlus-label" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg" style="max-width: 50%;">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="voirPlus-label">Informations sur la requête</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        <div class="card">
                                            <div class="card-body pt-5">
                                
                                                <div class="" style="font-weight: bold; color: gray;"> 
                                
                                                  <div class="row">
                                                    <div class="label ">Nom du comptable: <label for="" class="text-dark">Comptable 1</label></div>
                                                  </div> <br>
                                
                                                  <div class="row">
                                                    <div class="label">Nom de l'agent commercial: <label for="" class="text-dark">Agent 1</label></div>
                                                  </div> <br>
                                
                                                  <div class="row">
                                                    <div class="label">Nom du mutualiste : <label for="" class="text-dark">Mutualiste 1</label></div>
                                                  </div> <br>
                                
                                                  <div class="row">
                                                    <div class="label">Prenom du mutualiste : <label for="" class="text-dark">Prenom mutualiste 1</label></div>
                                                  </div> <br>
                                
                                                  <div class="row">
                                                    <div class="label">Matricule du mualiste : <label for="" class="text-dark">446JHGSYHNS22</label></div>
                                                  </div> <br>
                                
                                                  <div class="row">
                                                    <div class="label">Ancien montant de la cotisation : <label for="" class="text-dark">14000FCFA</label></div>
                                                  </div> <br>
                                
                                                  <div class="row">
                                                    <div class="label">Nouveau montant de la cotisation: <label for="" class="text-dark">18000FCFA</label></div>
                                                  </div> <br>
                                
                                                  <div class="row">
                                                    <div class="label">Heure du paiement: <label for="" class="text-dark">15h21</label></div>
                                                  </div> <br>
                                
                                                  <div class="row">
                                                    <div class="label">Justification : <label for="" class="text-dark">L'agent commercial a commis une erreur</label></div>
                                                  </div> <br>
                                                  
                                                  <div class="d-flex align-items-center justify-content-center">
                                                    <button class="btn btn-outline-success rounded-end me-4"
                                                      data-bs-toggle="modal" data-bs-target="#approuver{{ $t->id }}" type="button"
                                                      id="approuveRequête" name="approuveRequête">
                                                      Approuver
                                                    </button>
                                                    <button class="btn btn-outline-danger rounded-end"
                                                        data-bs-toggle="modal" data-bs-target="#refuser{{ $t->id }}"
                                                        style="margin-left:2px;" type="button" id="refuseRequête"
                                                        name="refuseRequête">
                                                        Rejeter
                                                    </button>
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
