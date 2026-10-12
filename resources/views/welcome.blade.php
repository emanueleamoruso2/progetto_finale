<x-layout>

<div class="home-background">

<div class="container home-container">

@if(session()->has('message'))
<div class="alert alert-success text-center">
{{ session('message') }}
</div>
@endif


<section class="home-hero">

<div class="row align-items-center justify-content-center g-5">

{{-- TESTO HERO --}}
<div class="col-12 col-lg-6 text-center text-lg-start">

<h1 class="home-title fw-bold">
{{ __('messages.hero_title') }}
</h1>


@auth

<h2 class="home-subtitle fw-bold mt-4">
{{ __('messages.greeting', ['name' => Auth::user()->name]) }}
</h2>

<p class="home-description mt-3">
{{ __('messages.auth_description') }}
</p>

@endauth


@guest

<h2 class="home-subtitle fw-bold mt-4">
{{ __('messages.guest_title') }}
</h2>

<p class="home-description mt-3">
{{ __('messages.guest_description') }}
</p>

@endguest


<a
href="{{ route('announce.create') }}"
class="btn btn-warning btn-lg fw-bold rounded-4 px-4 py-3 mt-3"
>
{{ __('messages.create_announce') }}
</a>


@guest
<p class="small text-muted mt-3">
{{ __('messages.login_required') }}
</p>
@endguest

</div>


{{-- IMMAGINE HERO --}}
<div class="col-12 col-lg-6">

<div class="home-image-wrapper">

<img
src="{{ asset('media/announce-img.png') }}"
alt="{{ __('messages.announce_image_alt') }}"
class="home-hero-image"
>

</div>

</div>

</div>

</section>


{{-- ANNUNCI --}}
<section class="home-announces">

<livewire:card-announce
:limit="6"
:page="1"
/>

</section>

</div>

</div>

</x-layout>