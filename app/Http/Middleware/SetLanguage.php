<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\App;

class SetLanguage
{
/**
* Handle an incoming request.
*
* @param  Closure(Request): (Response)  $next
*/
public function handle(Request $request, Closure $next): Response
{
$language = session()->get('locale', 'it');

App::setLocale($language);

return $next($request);
}
}
