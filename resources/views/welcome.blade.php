<x-layout>
<div class="container-fluid home-background">
<div class="container-fluid my-0 min-vh-50">
<div class="row justify-content-center align-items-center h-100 flex-column">
<div class="col-12 col-md-6 h-100 d-flex justify-content-center flex-column"><h1 class="text-center homepage">{{ __('messages.hero_title') }}</h1></div>
@if(Session()->has('message'))
<div class="alert alert-success">{{ session('message') }}</div>
@endif
@auth
<div class="col-12 col-md-6 d-flex flex-column justify-content-center align-items-center text-center">
<h2 class="fw-bold">{{ __('messages.greeting', ['name' => Auth::user()->name]) }}</h2>
<p class="fs-5">{{ __('messages.auth_description') }}</p>
<a href="{{ route('announce.create') }}" class="btn btn-warning btn-lg fw-bold px-5 py-3 rounded-4 shadow">{{ __('messages.create_announce') }}</a>
</div>
@endauth
@guest
<div class="col-12 col-md-6 d-flex flex-column justify-content-center align-items-center text-center">
<h2 class="fw-bold">{{ __('messages.guest_title') }}</h2>
<p class="fs-5">{{ __('messages.guest_description') }}</p>
<a href="{{ route('announce.create') }}" class="btn btn-warning btn-lg fw-bold px-5 py-3 rounded-4 shadow">{{ __('messages.create_announce') }}</a>
<p class="mt-3">{{ __('messages.login_required') }}</p>
</div>
@endguest
</div>
<div class="row justify-content-start align-items-center mt-5 h-100">
<div class="col-12 col-md-6 mt-5 ms-0 h-100 d-flex justify-content-start align-items-center"><img src="./media/announce-img.png" alt="{{ __('messages.announce_image_alt') }}" class="img-fluid img-announce"></div>
<div class="col-12 col-md-6 mt-5 ms-0 h-100 d-flex justify-content-center align-items-center flex-column">
<h1 class="text-center fw-bold text-dark">{{ __('messages.site_intro') }}</h1>
@if(!Auth::user())
<h3 class="text-dark">{{ __('messages.guest_action_start') }} <span class="fw-bold text-dark">{{ __('messages.register') }}</span> {{ __('messages.guest_action_middle') }} <span class="fw-bold text-dark">{{ __('messages.login') }}</span> {{ __('messages.guest_action_end') }}</h3>
<div class="buttons d-flex-justify-content center align-items-center">
<a href="{{ route('register') }}" class="anchor-custom"><button class="btn btn-warning rounded-4 p-0 p-md-1 btn-custom">{{ __('messages.register') }}</button></a>
<a href="{{ route('login') }}" class="anchor-custom"><button class="btn btn-success rounded-4 ms-4 p-0 p-md-1 btn-custom">{{ __('messages.login') }}</button></a>
</div>
@else
<h3>{{ __('messages.auth_second_message', ['name' => Auth::user()->name]) }}</h3>
<a href="{{ route('announce.create') }}" class="anchor-custom"><button class="btn btn-success rounded-4 ms-4 p-1 btn-custom">{{ __('messages.create_announce_short') }}</button></a>
@endif
</div>
</div>
</div>
<div class="container-fluid my-0">
<div class="row justify-content-center align-items-center mt-0">
<div id="homepage-announces"><livewire:card-announce :limit="6" :page="1" /></div>
</div>
</div>
</div>
</x-layout>
