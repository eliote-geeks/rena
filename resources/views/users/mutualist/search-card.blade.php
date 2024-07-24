<x-layouts>
    <base href="/">
    <ul class="nav nav-tabs nav-tabs-bordered">

        <li class="nav-item">
            <a  class="nav-link active" href='javascript:;'>Recherche
                avec la carte</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href='{{ route('searchMutualist') }}' >Recherche
            </a>
        </li>


    </ul>
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h1 class="fw-bold text-center text-black mb-4">APPROCHEZ LA CARTE DU MUTUALISTE POUR RECHERCHER SON COMPTE</h1>
    
                <form action="{{ route('searchByCard') }}" method="POST" id="account-form" autocomplete="off">
                    @csrf
                    <div class="d-flex justify-content-center mb-3">
                        <div class="spinner-grow text-primary" style="width: 7rem; height: 7rem;">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
    
                    <div class="form-floating mb-3 visually-hidden">
                        <input  type="text" class="form-control" id="floatingInput" placeholder="card" name="id_card_smart" autofocus>
                        <label for="floatingInput">Card</label>
                    </div>
    
                    @error('id_card_smart')
                            <small class="text-danger">{{ $message }}Afficher une erreur si carte désactivée ou non existantes</small>
                    @enderror
    
                </form>
            </div>
        </div>
    </div>

    @if (session()->has('error'))
      <p class="text-danger">{{ session()->get('error') }}</p>  
    @endif
    
</x-layouts>