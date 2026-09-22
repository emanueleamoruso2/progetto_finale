<div>

    <div class="row justify-content-center align-items-center {{ $page == 2 ? 'margin-component-cards-announce' : '' }}">

        @foreach($announces as $announce)

            <div class="card rounded-4 py-2 mx-5 my-3 my-md-2 d-flex flex-column card-announce justify-content-start">

                {{-- TITOLO --}}

                <h1 class="fw-bold" title="{{ $announce->title }}">
                    Titolo: {{ Str::limit($announce->title, 15, '...') }}
                </h1>


                {{-- PREZZO --}}

                <h2 class="size-card-announce">
                    Prezzo: {{ $announce->price }} €
                </h2>


                {{-- CATEGORIA --}}

                <h2 class="size-card-announce">
                    L'annuncio appartiene alla categoria:
                    <span class="fw-bold">
                        {{ $announce->category->name }}
                    </span>
                </h2>


                {{-- DESCRIZIONE --}}

                <h2 class="size-card-announce">
                    <span class="fw-bold text-success">
                        {{ $announce->description }}
                    </span>
                </h2>


                {{-- UTENTE --}}

                <h2 class="size-card-announce">
                    Inserito dall'utente: {{ $announce->user->name }}
                </h2>


                {{-- CONTATTO --}}

                <p>
                    Per maggiori informazioni, puoi inviare una mail all'utente o leggere il dettaglio 

                <div class="d-flex justify-content-center align-items-center ">

                    <a
                        href="mailto:{{ $announce->user->email }}"
                        class="btn btn-warning mt-2 p-2"
                    >
                        {{ $announce->user->email }}
                    </a>
                      <a
                        href="{{route('announce.show',$announce)}}"
                        class="btn btn-success mt-2 p-2 ms-3"
                    >
                        Vai al dettaglio
                    </a>

                </div>

            </div>

        @endforeach

    </div>

</div>