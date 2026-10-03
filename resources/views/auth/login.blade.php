<x-layout>
<header class="header">
<div class="container h-100 mt-5">
<div class="row justify-content-center align-items-center h-100">
<div class="col-12 col-md-6 d-flex justify-content-center"><h1 class="text-center my-5">{{ __('messages.login') }}</h1></div>
</div>
</div>
</header>
<x-display-errors />
<div class="container">
<div class="row my-0 justify-content-center flex-column align-items-center">
<div class="col-12 col-md-6 mb-5"><h1 class="text-center">{{ __('messages.login_welcome') }}</h1></div>
<div class="col-12 col-md-6">
<form action="{{ route('login') }}" method="POST" class="p-4 shadow rounded-4 bg-dark">
@csrf
<div class="mb-3"><label for="email" class="form-label text-white">{{ __('messages.email') }}</label><input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" value="" autocomplete="off"></div>
<div class="mb-3"><label for="password" class="form-label text-white">{{ __('messages.password') }}</label><input type="password" class="form-control" id="password" name="password" value="" autocomplete="new-password"></div>
<button type="submit" class="btn btn-primary">{{ __('messages.login') }}</button>
</form>
</div>
</div>
</div>
</x-layout>
