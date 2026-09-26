<x-layout>

<div class="container margin-container">

<div class="row justify-content-center align-items-center">

<div class="col-12 text-center">

<h1 class="fw-bold">
Pagina Revisore
</h1>

<h3 class="mt-3">
Annunci da revisionare: {{ $count }}
</h3>

</div>

</div>

<div class="row justify-content-center align-items-center mt-5">

@if($announce)

<div class="col-12 col-md-8 col-lg-6">

<div class="card rounded-4 p-4">

<h2 class="fw-bold">
{{ $announce->title }}
</h2>

<h3 class="mt-3">
Prezzo: {{ $announce->price }} €
</h3>

<h4 class="mt-3">
Categoria:
<span class="fw-bold">
{{ $announce->category->name }}
</span>
</h4>

<p class="fs-5 mt-3">
Descrizione: {{ $announce->description }}
</p>

<p class="mt-3">
Inserito da:
<span class="fw-bold">
{{ $announce->user->name }}
</span>
</p>
<div class="d-flex justify-content-center align-items-center gap-3 mt-4">

    <form action="{{ route('revisor.accept', $announce) }}" method="POST">

        @csrf
        @method('PATCH')

        <button type="submit" class="btn btn-success rounded-4 p-3">
            Accetta
        </button>

    </form>

    <form action="{{ route('revisor.reject', $announce) }}" method="POST">

        @csrf
        @method('PATCH')

        <button type="submit" class="btn btn-danger rounded-4 p-3">
            Rifiuta
        </button>

    </form>
</div>
</div>

</div>

@else

<div class="col-12 text-center">
    
    <h2>
        Non ci sono annunci da revisionare
    </h2>
    
</div>

@endif
@if(session()->has('last_reviewed_announce'))
<div class="d-flex mt-5 justify-content-center">
    <form action="{{ route('revisor.review') }}" method="POST">
   
           @csrf
           @method('PATCH')
   
           <button
               type="submit"
               class="btn btn-warning rounded-4 p-3"
           >
               Annulla ultima operazione
           </button>
   
       </form>
</div>
    @endif

</div>

</div>

</x-layout>