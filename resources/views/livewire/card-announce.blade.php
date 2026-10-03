<div>
@if($page == 1)
<h1 class="text-center text-black fw-bold mt-5">{{ trim($search) !== '' ? __('messages.search_results') : __('messages.latest_six') }}</h1>
@endif
@if($page == 1 || $page == 2)
<div class="container mt-4 mb-4">
<div class="row justify-content-center">
<div class="col-12 col-md-8 col-lg-6"><input type="search" wire:model.live.debounce.500ms="search" class="form-control rounded-4 p-3" placeholder="{{ __('messages.search_placeholder') }}"></div>
</div>
</div>
@endif
<div class="row justify-content-center align-items-center {{ $page == 2 ? 'margin-component-cards-announce' : '' }}">
@forelse($announces as $announce)
<div class="card rounded-4 py-2 mx-5 my-3 my-md-2 d-flex flex-column card-announce justify-content-start">
{{-- TITOLO --}}
<h1 class="fw-bold" title="{{ $announce->title }}">{{ __('messages.title') }}: {{ Str::limit($announce->title, 15, '...') }}</h1>
{{-- PREZZO --}}
<h2 class="size-card-announce">{{ __('messages.price') }}: {{ $announce->price }} €</h2>
{{-- CATEGORIA --}}
<h2 class="size-card-announce">{{ __('messages.belongs_category') }} <span class="fw-bold">{{ __($announce->category->name) }}</span></h2>
{{-- DESCRIZIONE --}}
<h2 class="size-card-announce"><span class="fw-bold text-success">{{ $announce->description }}</span></h2>
{{-- UTENTE --}}
<h2 class="size-card-announce">{{ __('messages.posted_by_user') }} {{ $announce->user->name }}</h2>
{{-- CONTATTO --}}
<p>{{ __('messages.contact_or_details') }}</p>
<div class="d-flex justify-content-center align-items-center ">
<a href="mailto:{{ $announce->user->email }}" class="btn btn-warning mt-2 p-2">{{ $announce->user->email }}</a>
<a href="{{ route('announce.show', $announce) }}" class="btn btn-success mt-2 p-2 ms-3">{{ __('messages.view_details') }}</a>
</div>
</div>
@empty
<div class="col-12 text-center">
<h2 class="fw-bold">{{ __('messages.no_announces') }}</h2>
<p class="fs-5">{{ __('messages.change_search') }}</p>
</div>
@endforelse
</div>
</div>
