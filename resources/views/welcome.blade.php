<x-layout>
<div class="container-fluid home-background">
<div class="container-fluid my-0 min-vh-50">
<div class="row justify-content-center align-items-center h-100 flex-column">
<div class="col-12 col-md-6 h-100 d-flex justify-content-center flex-column">
<h1 class="text-center homepage">Vendi oggetti inutilizzati</h1>
</div>
@if(Session()->has('message'))
<div class="alert alert-success">
{{session('message')}}
</div>
@endif
@auth
<div class="col-12 col-md-6 d-flex flex-column justify-content-center align-items-center text-center">
<h2 class="fw-bold">
Ciao {{ Auth::user()->name }}!
</h2>
<p class="fs-5">
Hai qualcosa da vendere? Pubblica subito il tuo annuncio.
</p>
<a
href="{{ route('announce.create') }}"
class="btn btn-warning btn-lg fw-bold px-5 py-3 rounded-4 shadow">
Inserisci un annuncio
</a>
</div>
@endauth
@guest
<div class="col-12 col-md-6 d-flex flex-column justify-content-center align-items-center text-center">
<h2 class="fw-bold">
Hai qualcosa da vendere?
</h2>
<p class="fs-5">
Inserisci il tuo annuncio e trova un acquirente.
</p>
<a
href="{{ route('announce.create') }}"
class="btn btn-warning btn-lg fw-bold px-5 py-3 rounded-4 shadow">
Inserisci un annuncio
</a>
<p class="mt-3">
Per pubblicare devi prima accedere o registrarti.
</p>
</div>
@endguest
</div>
<div class="row justify-content-start align-items-center mt-5 h-100">
<div class="col-12 col-md-6 mt-5 ms-0 h-100 d-flex justify-content-start align-items-center">
<img src="./media/announce-img.png" alt="Immagine Annuncio" class="img-fluid img-announce">
</div>
<div class="col-12 col-md-6 mt-5 ms-0 h-100 d-flex justify-content-center align-items-center flex-column">
<h1 class="text-center fw-bold text-dark">Questo è un sito di annunci</h1>
@if(!Auth::user())
<h3 class="text-dark">Clicca sul bottone <span class="fw-bold text-dark "> Registrati</span>, altrimenti se sei già registrato clicca sul bottone <span class="fw-bold text-dark ">Accedi</span> </h3>
<div class="buttons d-flex-justify-content center align-items-center">
<a href="{{route('register')}}" class="anchor-custom">  <button class="btn btn-warning rounded-4 p-0 p-md-1 btn-custom">Registrati</button></a>
<a href="{{route('login')}}" class="anchor-custom">  <button class="btn btn-success rounded-4 ms-4 p-0 p-md-1 btn-custom">Accedi</button></a>

</div>

@else
<h3>Caro {{Auth::user()->name}}, puoi creare il tuo annuncio cliccando sul seguente bottone</h3>
<a href="{{route('announce.create')}}" class="anchor-custom">  <button class="btn btn-success rounded-4 ms-4 p-1 btn-custom">Crea Annuncio</button></a>
@endif
</div>
</div>
</div>
<div class="container-fluid my-0">
    <div class="row justify-content-center align-items-center mt-0">
        <div id="homepage-announces">
            <livewire:card-announce :limit="6" :page="1" />
        </div>
    </div>
</div>
</div>
</x-layout>