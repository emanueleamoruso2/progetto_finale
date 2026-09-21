<x-layout>
      <div class="container-fluid my-0 home-background min-vh-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-md-6 h-100 d-flex justify-content-center">
                <h1 class="text-center homepage">Homepage</h1>
            </div>
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
                         <a href="{{route('register')}}" class="anchor-custom">  <button class="btn btn-warning rounded-4 ms-4 p-1 btn-custom">Registrati</button></a>
                        <a href="{{route('login')}}" class="anchor-custom">  <button class="btn btn-success rounded-4 ms-4 p-1 btn-custom">Accedi</button></a>
                      
                    </div>
                
                @else
                    <h3>Caro {{Auth::user()->name}}, puoi creare il tuo annuncio cliccando sul seguente bottone</h3>
                   <a href="{{route('announce.create')}}" class="anchor-custom">  <button class="btn btn-success rounded-4 ms-4 p-1 btn-custom">Crea Annuncio</button></a>
                @endif
            </div>
        </div>
    </div>
</x-layout>