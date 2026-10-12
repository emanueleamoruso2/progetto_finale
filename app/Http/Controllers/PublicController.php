<?php

namespace App\Http\Controllers;

use App\Mail\WorkwithUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;
use App\Models\Announce;


class PublicController extends Controller
{
public function homepage(){
return view('welcome');
}

public function WorkwithUs(){
$user=Auth::user();
if($user){
return view('work-with-us',compact('user'));
}
}

public function sendEmail(Request $request)
{
$user = Auth::user();

$description = $request->description;

Mail::to('candidature@noreply.com')->send(
new WorkwithUs($user, $description)
);

return redirect()
->route('homepage')
->with('message', 'Candidatura inviata con successo');
}
public function searchAnnounces(Request $request)
{
$query = $request->input('query');

$announces = Announce::search($query)
->where('is_accepted', true)
->paginate(8);

return view('announce.searched', [
'announces' => $announces,
'query' => $query,
]);
}
}
