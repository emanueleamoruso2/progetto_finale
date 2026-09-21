<div>
    <div class="row justify-content-center align-items-center vh-100 mt-5">
        @foreach($announces as $announce)
        <div class="card rounded-4 py-2 mx-5 d-flex flex-column card-announce justify-content-start">
            <h1 class="fw-bold">Titolo: {{$announce->title}}</h1>
            <h2 class="size-card-announce">Prezzo: {{$announce->price}} €</h2>
            <h2 class="size-card-announce">L'articolo appartiene alla categoria: <span class="fw-bold">{{$announce->category->name}}</span> </h2>
            <h2 class="size-card-announce"> <span class="fw-bold text-success">{{$announce->description}}</span></h2>
            <h2 class="size-card-announce">Inserito dall'utente: {{$announce->user->name}}</h2>
            <p>Per maggiori informazioni, puoi contattarlo al seguente indirizzo mail:</p>
            <div class="d-flex justify-content-center align-items-center">
                <button class="btn btn-warning mt-2 p-2">
                    {{$announce->user->email}}
                </button>
            </div>
        </div>
        @endforeach
    </div>
</div>
