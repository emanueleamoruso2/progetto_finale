<nav class="navbar navbar-expand-lg navbar-dark custom-navbar fixed-top">
    <div class="container-fluid custom-navbar-container">
        <div class="custom-navbar-left">
            <a class="navbar-brand custom-brand"
               href="{{ route('homepage') }}">
                <span class="brand-icon">✦</span>
                <span>Progetto Finale</span>
            </a>
        </div>
        <button
            class="navbar-toggler custom-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Apri menu"
        >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div
            class="collapse navbar-collapse custom-collapse"
            id="navbarSupportedContent"
        >
            <ul class="navbar-nav custom-menu">
                @auth
                    <li class="nav-item">
                        <span class="nav-link custom-greeting">
                            Ciao {{ Auth::user()->name }}
                        </span>
                    </li>
                    <li class="nav-item">
                        <form
                            action="{{ route('logout') }}"
                            method="POST"
                            class="logout-form"
                        >
                            @csrf
                            <button
                                type="submit"
                                class="btn btn-warning form-logout"
                            >
                                Logout
                            </button>
                        </form>
                    </li>
                @endauth
                <li class="nav-item">
                    <a
                        class="nav-link custom-link {{ request()->routeIs('homepage') ? 'active' : '' }}"
                        href="{{ route('homepage') }}"
                    >
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a
                        class="nav-link custom-link {{ request()->routeIs('announce.index') ? 'active' : '' }}"
                        href="{{ route('announce.index') }}"
                    >
                        Lista Annunci
                    </a>
                </li>
                <li class="nav-item d-lg-none">
                    <a
                        class="nav-link custom-link"
                        href="#"
                    >
                        Contatti
                    </a>
                </li>
            </ul>
        </div>
        <div class="custom-navbar-right d-none d-lg-flex">
            <a href="#" class="btn custom-button">
                Contatti
            </a>
        </div>
    </div>
</nav>