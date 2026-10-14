<div class="{{ $page == 2 ? 'container pb-5' : '' }}">

@if($page == 1)

<div class="home-announces-header text-center">

<h2 class="fw-bold">
{{ __('messages.latest_six') }}
</h2>

</div>

@endif


@if($page == 1 || $page == 2)

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
value="{{ request('query') }}"
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

@endif


<div class="row g-4 justify-content-center">

@forelse($announces as $announce)

<div class="col-12 col-md-6 col-lg-4">

<div class="card card-announce h-100">

<img
src="{{ $announce->images->isNotEmpty()
                            ? $announce->images->first()->getUrl(300, 300)
                            : asset('media/announce-img.png') }}"
alt="Immagine dell'annuncio {{ $announce->title }}"
class="card-announce-image {{ $page == 2 ? 'card-announce-image-index' : '' }}"
>


<div class="card-body d-flex flex-column">

<h3
class="card-announce-title fw-bold"
title="{{ $announce->title }}"
>
{{ Str::limit($announce->title, 35, '...') }}
</h3>


<p class="card-price fw-bold">
{{ __('messages.price') }}:
{{ $announce->price }} €
</p>


<p class="card-category">

{{ __('messages.belongs_category') }}

<span class="badge bg-warning text-dark">
{{ __($announce->category->name) }}
</span>

</p>


<p class="card-description text-success fw-semibold">
{{ Str::limit($announce->description, 90, '...') }}
</p>


<p class="card-user text-muted">

{{ __('messages.posted_by_user') }}

<strong>
{{ $announce->user->name }}
</strong>

</p>


<div class="d-flex gap-2 mt-auto">

<a
href="mailto:{{ $announce->user->email }}"
class="btn btn-outline-warning rounded-4 flex-fill"
>
{{ __('messages.contact_seller') }}
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

<p>
{{ __('messages.change_search') }}
</p>

</div>

@endforelse

</div>

</div>