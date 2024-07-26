<x-layouts>
    <base href="/">

    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h1 class="fw-bold text-center text-black mb-4">APPROCHEZ LA CARTE DU MUTUALISTE POUR CREER SON COMPTE</h1>
    
                <form action="{{ route('addCardPost',$mutual) }}" method="POST" id="account-form" autocomplete="off">
                    @csrf
                    <div class="d-flex justify-content-center mb-3">
                        <div class="spinner-grow text-primary" style="width: 7rem; height: 7rem;">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
    
                    <div class="form-floating mb-3 visually-hidden">
                        <input  type="text" class="form-control" id="floatingInput" placeholder="card" name="id_card_smart" autocomplete="off" autofocus>
                        <label for="floatingInput">Card</label>
                    </div>
    
                    @error('id_card_smart')
                        <div class="text-danger text-center mb-3">
                            <small>{{ $message }}Afficher une erreur si carte désactivée ou non existantes</small>
                        </div>
                    @enderror
    
                </form>
            </div>
        </div>
    </div>

    {{-- <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h1 class="fw-bold text-center text-black mb-4">APPROCHEZ LA CARTE DU MUTUALISTE POUR CREER SON COMPTE
                </h1>

                <div class="d-flex justify-content-center mb-3">
                    <div class="spinner-grow text-primary" style="width: 7rem; height: 7rem;">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>

                <div class="d-flex justify-content-around">
                    @if (App\Models\SmartCard::where('id_card_smart', '7391825640')->count() == 0)
                        <form
                            action="{{ route('addCardPost', ['mutual' => $mutual->id, 'id_card_smart' => '7391825640']) }}"
                            method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary" id="card1">Card 1</button>
                        </form>
                    @endif

                    @if (App\Models\SmartCard::where('id_card_smart', '4950167382')->count() == 0)
                        <form
                            action="{{ route('addCardPost', ['mutual' => $mutual->id, 'id_card_smart' => '4950167382']) }}"
                            method="POST">
                            @csrf
                            <button type="submit" class="btn btn-secondary" id="card2">Card 2</button>
                        </form>
                    @endif

                    @if (App\Models\SmartCard::where('id_card_smart', '8372649150')->count() == 0)
                        <form
                            action="{{ route('addCardPost', ['mutual' => $mutual->id, 'id_card_smart' => '8372649150']) }}"
                            method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success" id="card3">Card 3</button>
                        </form>
                    @endif

                    @if (App\Models\SmartCard::where('id_card_smart', '1629840735')->count() == 0)
                        <form
                            action="{{ route('addCardPost', ['mutual' => $mutual->id, 'id_card_smart' => '1629840735']) }}"
                            method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger" id="card4">Card 4</button>
                        </form>
                    @endif
                </div>


                @error('id_card_smart')
                    <div class="text-danger text-center mt-3">
                        <small>{{ $message }}</small>
                    </div>
                @enderror

            </div>
        </div>
    </div> --}}


    @if (session()->has('message'))
        <p class="text-danger">{{ session()->get('message') }}</p>
    @endif

</x-layouts>
