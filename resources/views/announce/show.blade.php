<x-layout>

<div class="container pt-5 mt-5 pb-5">

<div class="row justify-content-center">

<div class="col-12 col-lg-10 col-xl-9 col-xxl-8">

<h1 class="text-center fw-bold mb-5">
{{ __('messages.announce_details') }}
</h1>

<div class="card rounded-4 py-3 shadow">

<div class="card-body">

<div class="row g-4 align-items-center justify-content-center">

{{-- IMMAGINI --}}
<div class="col-12 col-lg-6 d-flex justify-content-center">

<div class="swiper announce-swiper rounded-4">

<div class="swiper-wrapper">

@if($announce->images->count() > 0)

@foreach($announce->images as $key => $image)

<div class="swiper-slide bg-dark">

<img
src="{{ \Illuminate\Support\Facades\Storage::url($image->path) }}"
alt="Foto {{ $key + 1 }} dell'annuncio {{ $announce->title }}"
class="d-block w-100 announce-detail-image"
>

<span class="position-absolute top-0 start-0 m-3 badge bg-warning text-dark">
Foto {{ $key + 1 }}
</span>

</div>

@endforeach

@else

<div class="swiper-slide bg-dark">

<img
src="/media/announce-img.png"
alt="Immagine segnaposto"
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


{{-- DETTAGLI --}}
<div class="col-12 col-lg-6">

<div class="d-flex flex-column align-items-center text-center px-2 px-lg-3">

<h2 class="fw-bold text-break mb-4">
{{ __('messages.title') }}:
{{ $announce->title }}
</h2>

<h3 class="fw-bold mb-4">
{{ __('messages.price') }}:
{{ $announce->price }} €
</h3>

<h4 class="mb-4">
{{ __('messages.category') }}:

<a
href="{{ route('announce.index', ['category' => $announce->category_id]) }}"
class="text-decoration-none"
>
<button class="btn btn-warning fw-bold">
{{ __($announce->category->name) }}
</button>
</a>
</h4>

<h4 class="fw-bold">
{{ __('messages.description') }}:
</h4>

<p class="fs-5 text-break text-success fw-bold text-center mx-auto">
{{ $announce->description }}
</p>

<h5 class="mt-3 text-center">
{{ __('messages.posted_by_user') }}
<span class="fw-bold">
{{ $announce->user->name }}
</span>
</h5>

<p class="text-muted mt-3 text-center">
{{ __('messages.published_on') }}
{{ $announce->created_at->format('d/m/Y') }}
</p>

<p class="mt-3 text-center">
{{ __('messages.contact_info') }}
</p>

<div class="d-flex flex-column flex-sm-row justify-content-center gap-3 mt-3">

<a
href="mailto:{{ $announce->user->email }}"
class="btn btn-warning rounded-4 p-2"
>
{{ __('messages.contact_seller') }}
</a>

<a
href="{{ route('announce.index') }}"
class="btn btn-dark rounded-4 p-2"
>
{{ __('messages.back_to_announces') }}
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