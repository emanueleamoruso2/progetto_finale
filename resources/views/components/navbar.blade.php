<nav class="navbar navbar-expand-lg navbar-dark custom-navbar fixed-top">
<div class="container-fluid custom-navbar-container">
<div class="custom-navbar-left"><a class="navbar-brand custom-brand" href="{{ route('homepage') }}"><span class="brand-icon">✦</span><span>Progetto Finale</span></a></div>
<button class="navbar-toggler custom-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('messages.open_menu') }}"><span class="navbar-toggler-icon"></span></button>
<div class="collapse navbar-collapse custom-collapse" id="navbarSupportedContent">
<ul class="navbar-nav custom-menu">
@auth
<li class="nav-item"><span class="nav-link custom-greeting">{{ __('messages.navbar_greeting', ['name' => Auth::user()->name]) }}</span></li>
<li class="nav-item"><form action="{{ route('logout') }}" method="POST" class="logout-form">@csrf <button type="submit" class="btn btn-warning form-logout">{{ __('messages.logout') }}</button></form></li>
@endauth
<li class="nav-item"><a class="nav-link custom-link {{ request()->routeIs('homepage') ? 'active' : '' }}" href="{{ route('homepage') }}">{{ __('messages.home') }}</a></li>
<li class="nav-item"><a class="nav-link custom-link {{ request()->routeIs('WorkwithUs') ? 'active' : '' }}" href="{{ route('WorkwithUs') }}">{{ __('messages.work_with_us') }}</a></li>
<li class="nav-item"><a class="nav-link custom-link {{ request()->routeIs('announce.index') ? 'active' : '' }}" href="{{ route('announce.index') }}">{{ __('messages.announces_list') }}</a></li>
@auth
@if(Auth::user()->is_revisor)
<li class="nav-item"><a class="nav-link custom-link {{ request()->routeIs('revisor.index') ? 'active' : '' }}" href="{{ route('revisor.index') }}">{{ __('messages.revisor_page') }}</a></li>
@endif
@endauth
<li class="nav-item"><a href="{{ route('language.change', 'it') }}" class="nav-link" title="{{ __('messages.italian') }}"><img src="/media/it.png" alt="{{ __('messages.italian') }}" width="35"></a></li>
<li class="nav-item"><a href="{{ route('language.change', 'en') }}" class="nav-link" title="{{ __('messages.english') }}"><img src="/media/gb.png" alt="{{ __('messages.english') }}" width="35"></a></li>
<li class="nav-item d-lg-none"><a class="nav-link custom-link" href="#">{{ __('messages.contacts') }}</a></li>
</ul>
</div>
<div class="custom-navbar-right d-none d-lg-flex"><a href="#" class="btn custom-button">{{ __('messages.contacts') }}</a></div>
</div>
</nav>
