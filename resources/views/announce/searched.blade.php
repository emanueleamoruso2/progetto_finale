<x-layout>

<div class="container mt-custom pb-5">

{{-- TITOLO RISULTATI --}}
<div class="row justify-content-center">

<div class="col-12 text-center mb-4">

<h1 class="fw-bold">
Risultati della ricerca
</h1>

@if($query)
<p class="fs-5 text-muted">
Risultati per:
<strong>{{ $query }}</strong>
</p>
@endif

</div>

</div>


{{-- BARRA DI RICERCA --}}
<div class="row justify-content-center mb-5">

<div class="col-12 col-md-9 col-lg-7">

<form
action="{{ route('announce.search') }}"
method="GET"
class="search-box"
>

<input
type="search"
name="query"
class="form-control"
placeholder="{{ __('messages.search_placeholder') }}"
value="{{ $query }}"
>

<button
type="submit"
class="btn btn-warning fw-bold"
>
Cerca
</button>

</form>

</div>

</div>


{{-- RISULTATI --}}
<div class="row g-4 justify-content-center">

@forelse($announces as $announce)

<div class="col-12 col-md-6 col-lg-4">

<div class="card card-announce h-100">

{{-- IMMAGINE --}}
<img
src="{{ $announce->images->isNotEmpty()
                                ? Storage::url($announce->images->first()->path)
                                : asset('media/announce-img.png') }}"
alt="Immagine dell'annuncio {{ $announce->title }}"
class="card-announce-image"
>


<div class="card-body d-flex flex-column">

{{-- TITOLO --}}
<h3
class="card-announce-title fw-bold"
title="{{ $announce->title }}"
>
{{ Str::limit($announce->title, 35, '...') }}
</h3>


{{-- PREZZO --}}
<p class="card-price fw-bold">

{{ __('messages.price') }}:
{{ $announce->price }} €

</p>


{{-- CATEGORIA --}}
<p class="card-category">

{{ __('messages.belongs_category') }}

<span class="badge bg-warning text-dark">
{{ __($announce->category->name) }}
</span>

</p>


{{-- DESCRIZIONE --}}
<p class="card-description text-success fw-semibold">

{{ Str::limit($announce->description, 90, '...') }}

</p>


{{-- UTENTE --}}
<p class="card-user text-muted">

{{ __('messages.posted_by_user') }}

<strong>
{{ $announce->user->name }}
</strong>

</p>


{{-- BOTTONI --}}
<div class="d-flex gap-2 mt-auto">

<a
href="mailto:{{ $announce->user->email }}"
class="btn btn-outline-warning rounded-4 flex-fill"
>
Contatta
</a>


<a
href="{{ route('announce.show', $announce) }}"
class="btn btn-success rounded-4 flex-fill"
>
{{ __('messages.view_details') }}
</a>

</div>

</div>

</div>

</div>

@empty

<div class="col-12 text-center py-5">

<h2 class="fw-bold">
{{ __('messages.no_announces') }}
</h2>

<p class="fs-5 text-muted">
{{ __('messages.change_search') }}
</p>

</div>

@endforelse

</div>


{{-- PAGINAZIONE --}}
@if($announces->hasPages())

<div class="row mt-5">

<div class="col-12 d-flex justify-content-center">

{{ $announces->appends([
'query' => $query
])->links() }}

</div>

</div>

@endif

</div>

</x-layout>