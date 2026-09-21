
<div>
<div>
<div class="container my-5">
<div class="row justify-content-center">
<div class="col-12 col-md-6 mt-5">
@if (session('message'))
<div class="alert alert-success">
{{ session('message') }}
</div>
@endif

  <div class="container-fluid my-5">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12">
                <h1 class="text-dark text-center">Crea il tuo annuncio</h1>
            </div>
        </div>
    </div>

<form class="shadow p-5 rounded-5 bg-secondary" wire:submit="store">
<div class="mb-3">
<label for="title" class="form-label">Titolo Annuncio</label>
<input wire:model.live.debounce.1000ms="title" type="text" class="form-control" id="title">
@error('title')<div class="text-danger fw-bold"> {{$message}}  </div>@enderror
</div>
<div class="mb-3">
<label for="price" class="form-label">Prezzo</label>
<input wire:model.live.debounce.1000ms="price" type="number" class="form-control" id="price">
@error('price')<div class="text-danger fw-bold"> {{$message}}  </div>@enderror
</div>
<div class="mb-3">
<label for="description" class="form-label">Descrizione</label>
<textarea wire:model.live.debounce.1000ms="description" id="description" class="form-control" cols="30" rows="10"></textarea>
@error('description')<div class="text-danger fw-bold"> {{$message}}  </div>@enderror
</div>
<div>
    @error('category')
        <div class="text-danger fw-bold">{{ $message }}</div>
    @enderror
    
    @foreach ($categories as $category)
        <label>
            <input
                type="radio"
                wire:model="category"
                value="{{ $category->id }}"
            >
            {{ $category->name }}
        </label>
    @endforeach
</div>
<div class="div-button d-flex justify-content-center align-items-center pb-0 mb-0">
    <button type="submit" class="btn btn-primary mt-3 mb-0">Crea Annuncio</button>
</div>
</form>
</div>
</div>
</div>

</div>

</div>