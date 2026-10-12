<x-layout>
<div class="container margin-container mt-custom">
<div class="row justify-content-center align-items-center">
<div class="col-12 text-center">
<h1 class="fw-bold">{{ __('messages.revisor_page') }}</h1>
<h3 class="mt-3">
    {{ __('messages.pending_count', [
        'count' => \App\Models\Announce::toBeRevisedCount()
    ]) }}
</h3>
</div>
</div>
<div class="row justify-content-center align-items-center mt-5">
@if($announce)
<div class="col-12 col-md-8 col-lg-6">
<div class="card rounded-4 p-4">
@if($announce->images->count() > 0)
<div class="row justify-content-center mb-4">
@foreach($announce->images as $key => $image)
<div class="col-12 col-md-4 mb-3">
<img
src="{{ Storage::url($image->path) }}"
alt="Foto {{ $key + 1 }} dell'annuncio {{ $announce->title }}"
class="img-fluid rounded-4 shadow"
>
</div>
@endforeach
</div>
@else
<div class="text-center mb-4">
<img
src="/media/announce-img.png"
alt="Immagine segnaposto"
class="img-fluid rounded-4 shadow"
>
</div>
@endif
<h2 class="fw-bold">{{ $announce->title }}</h2>
<h3 class="mt-3">{{ __('messages.price') }}: {{ $announce->price }} €</h3>
<h4 class="mt-3">{{ __('messages.category') }}: <span class="fw-bold">{{ __($announce->category->name) }}</span></h4>
<p class="fs-5 mt-3">{{ __('messages.description') }}: {{ $announce->description }}</p>
<p class="mt-3">{{ __('messages.posted_by') }} <span class="fw-bold">{{ $announce->user->name }}</span></p>
<div class="d-flex justify-content-center align-items-center gap-3 mt-4">
<form action="{{ route('revisor.accept', $announce) }}" method="POST">@csrf @method('PATCH') <button type="submit" class="btn btn-success rounded-4 p-3">{{ __('messages.accept') }}</button></form>
<form action="{{ route('revisor.reject', $announce) }}" method="POST">@csrf @method('PATCH') <button type="submit" class="btn btn-danger rounded-4 p-3">{{ __('messages.reject') }}</button></form>
</div>
</div>
</div>
@else
<div class="col-12 text-center"><h2>{{ __('messages.none_pending') }}</h2></div>
@endif
@if(session()->has('last_reviewed_announce'))
<div class="d-flex mt-5 justify-content-center">
<form action="{{ route('revisor.review') }}" method="POST">@csrf @method('PATCH') <button type="submit" class="btn btn-warning rounded-4 p-3">{{ __('messages.undo_last') }}</button></form>
</div>
@endif
</div>
</div>
</x-layout>
