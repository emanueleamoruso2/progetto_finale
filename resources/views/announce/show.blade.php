<x-layout>

<div class="container mt-custom pb-5">

{{-- TORNA ALLA LISTA ANNUNCI --}}
<div class="row mb-4">

<div class="col-12">

<a
href="{{ route('announce.index') }}"
class="btn btn-outline-success rounded-4 px-4"
>
← Torna agli annunci
</a>

</div>

</div>


<div class="row justify-content-center">

<div class="col-12 col-lg-10 col-xl-9 col-xxl-8">

<div class="row g-4 align-items-center">

{{-- IMMAGINI --}}
<div class="col-12 col-lg-6">

<div class="swiper announce-swiper rounded-4">

<div class="swiper-wrapper">

@if($announce->images->count() > 0)

@foreach($announce->images as $key => $image)

<div class="swiper-slide bg-dark">

<img
src="{{ $image->getUrl(300, 300) }}"
alt="Foto {{ $key + 1 }} dell'annuncio {{ $announce->title }}"
class="d-block w-100 announce-detail-image"
>

<span
class="position-absolute bottom-0 start-0 bg-dark text-white px-3 py-2 rounded-end"
>
Foto {{ $key + 1 }}
</span>

</div>

@endforeach

@else

<div class="swiper-slide">

<img
src="{{ asset('media/announce-img.png') }}"
alt="Immagine non disponibile"
class="d-block w-100 announce-detail-image"
>

</div>

@endif

</div>


@if($announce->images->count() > 1)

<div class="swiper-pagination"></div>

<div class="swiper-button-prev"></div>

<div class="swiper-button-next"></div>

@endif

</div>

</div>


{{-- DETTAGLI ANNUNCIO --}}
<div class="col-12 col-lg-6 d-flex flex-column align-items-center text-center">

<h1 class="fw-bold mb-4">
{{ $announce->title }}
</h1>


<h3 class="mb-3">

{{ __('messages.price') }}:

<span class="fw-bold">
{{ $announce->price }} €
</span>

</h3>


{{-- CATEGORIA CLICCABILE --}}
<p class="fs-5 mb-3">

{{ __('messages.belongs_category') }}

<a
href="{{ route('announce.index', ['category' => $announce->category->id]) }}"
class="text-decoration-none"
>

<span class="badge bg-warning text-dark">
{{ __($announce->category->name) }}
</span>

</a>

</p>


<p class="fs-5 text-success fw-semibold mb-4">
{{ $announce->description }}
</p>


<p class="mb-4">

{{ __('messages.posted_by_user') }}

<strong>
{{ $announce->user->name }}
</strong>

</p>


<a
href="mailto:{{ $announce->user->email }}"
class="btn btn-warning rounded-4 px-4 py-2 fw-bold"
>
{{ __('messages.contact_seller') }}
</a>

</div>

</div>

</div>

</div>

</div>

</x-layout>