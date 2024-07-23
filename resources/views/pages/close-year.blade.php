<x-layouts>
    <base href="/">

    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Cloturer l'année</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">

            <div class="col-xl-9">

                <div class="card">
                    <div class="card-body pt-3">
                        <div class="tab-content pt-2">

                            <div class="" style="font-weight: bold; color: gray;">

                                <!-- Profile Edit Form -->
                                <form action="#" method="post" id="account-form">

                                    <div class="centered-div ">
                                        <div class="form-floating mb-3">
                                            <center>
                                                <i class="bi bi-x-circle text-danger" style="font-size: 6rem;"></i>
                                            </center>
                                        </div>
                                        <h1 class="fw-bold text-black">
                                            <center>VOULEZ-VOUS VRAIMENT CLOTURER L'ANNEE?</center>
                                        </h1>
                                        <hr class="my-3">
                                        <div class="form-floating mb-3">
                                            <center>
                                                <div class="btn-group">
                                                    <a href="{{ route('closeYear',$year) }}" class="btn btn-danger btn-lg"
                                                        style=>Oui</a>
                                                    <button type="button" class="btn btn-success btn-lg">Non</button>
                                                </div>
                                            </center>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div><!-- End Profile Edit Form -->
                </div>
            </div><!-- End Bordered Tabs -->
        </div>
    </section>

</x-layouts>
