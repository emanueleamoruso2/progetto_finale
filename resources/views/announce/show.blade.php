<x-layout>

<div class="container pt-5 mt-5 pb-5">

<div class="row justify-content-center align-items-center">

<div class="col-12 col-lg-10">

<h1 class="text-center fw-bold mb-5">
Dettaglio Annuncio
</h1>

<div class="card rounded-4 py-2 shadow">

<div class="card-body">

<div class="row g-4 align-items-center">

<div class="col-12 col-lg-6">

<div class="swiper announce-swiper rounded-4">

<div class="swiper-wrapper">

@for($i = 1; $i <= 3; $i++)

<div class="swiper-slide bg-dark">

<img
src="{{ asset('media/announce-img.png') }}"
alt="Foto {{ $i }} dell'annuncio {{ $announce->title }}"
class="d-block w-100 announce-detail-image"
>

<span class="position-absolute top-0 start-0 m-3 badge bg-warning text-dark">
Foto {{ $i }}
</span>

</div>

@endfor

</div>

<div class="swiper-pagination"></div>

<div class="swiper-button-prev"></div>

<div class="swiper-button-next"></div>

</div>

</div>

<div class="col-12 col-lg-6">

<div class="d-flex flex-column h-100 px-2 px-lg-3">

<h2 class="fw-bold text-break mb-4">
Titolo: {{ $announce->title }}
</h2>

<h3 class="fw-bold mb-4">
Prezzo: {{ $announce->price }} €
</h3>

<h4 class="mb-4">
Categoria:
<span>
    <a href="{{route('announce.index', ['category' => $announce->category_id])}}" class="fw-bold text-decoration-none rounded">
        <button class="btn btn-warning">{{ $announce->category->name }}</button></a>
</span>
</h4>

<h4 class="fw-bold">
Descrizione:
</h4>

<p class="fs-5 text-break text-success fw-bold">
{{ $announce->description }}
</p>

<h5 class="mt-3">
Inserito dall'utente:
<span class="fw-bold">
{{ $announce->user->name }}
</span>
</h5>

<p class="text-muted mt-3">
Pubblicato il:
{{ $announce->created_at->format('d/m/Y') }}
</p>

<p class="mt-3">
Per maggiori informazioni, puoi contattare l'inserzionista al seguente indirizzo mail:
    </p>
    
    <div class="d-flex flex-column flex-sm-row gap-3 mt-3">
    
    <a
    href="mailto:{{ $announce->user->email }}"
    class="btn btn-warning rounded-4 p-2"
    >
    Contatta l'inserzionista
    </a>
    
    <a
    href="{{ route('announce.index') }}"
    class="btn btn-dark rounded-4 p-2"
    >
    Torna agli annunci
    </a>
    
    </div>
    
    </div>
    
    </div>
    
    </div>
    
    </div>
    
    </div>
    
    </div>
    
    </div>
    
    </div>
    
    </x-layout>