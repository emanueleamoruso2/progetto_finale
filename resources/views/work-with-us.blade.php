<x-layout>
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
                <h1 class="text-dark text-center">Invia una richiesta per lavorare con noi</h1>
            </div>
        </div>
    </div>

<form class="shadow p-5 rounded-5 bg-secondary" method="POST" enctype="multipart/form-data" action="{{route('SendEmail')}}">
<div class="mb-3">
<label for="name" class="form-label">Nome utente</label>
<input type="text" name="name" class="form-control" id="name" value="{{$user->name}}">
@error('title')<div class="text-danger fw-bold"> {{$message}}  </div>@enderror
</div>
<div class="mb-3">
<label for="email" class="form-label">email utente</label>
<input type="email" name="email" class="form-control" id="email" value="{{$user->email}}">
@error('title')<div class="text-danger fw-bold"> {{$message}}  </div>@enderror
</div>
<div class="mb-3">
<label for="description" class="form-label">Descrizione richiesta</label>
<textarea id="description" name="description" class="form-control" cols="30" rows="10"></textarea>
@error('description')<div class="text-danger fw-bold"> {{$message}}  </div>@enderror
</div>
<div class="div-button d-flex justify-content-center align-items-center pb-0 mb-0">
    <button type="submit" class="btn btn-primary mt-3 mb-0">Invia Richiesta</button>
</div>
</form>
</div>
</div>
</div>
</x-layout>
