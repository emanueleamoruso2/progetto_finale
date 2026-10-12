<?php

namespace App\Http\Controllers;

use App\Models\Announce;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller
{
    public function index()
    {
        $announce = Announce::whereNull('is_accepted')
            ->oldest()
            ->first();
        return view('revisor.index', compact('announce'));
    }

    public function makeRevisor(User $user)
{
    Artisan::call('app:make-user-revisor', [
        'email' => $user->email,
    ]);

    return redirect()
        ->route('homepage')
        ->with('message', 'Utente reso revisore correttamente');
}
public function accept(Announce $announce)
{
    session()->put('last_reviewed_announce', $announce->id);

    $announce->setAccepted(true);

    $announce->save();

    return redirect()->route('revisor.index');
}

public function reject(Announce $announce)
{
    session()->put('last_reviewed_announce', $announce->id);

    $announce->setAccepted(false);

    $announce->save();

    return redirect()->route('revisor.index');
}

public function review()
{
    $announceId = session()->get('last_reviewed_announce');
    if (!$announceId) {
        return redirect()->route('revisor.index');
    }
    $announce = Announce::find($announceId);
    if (!$announce) {
        return redirect()->route('revisor.index');
    }
   $announce->setAccepted(null);
    $announce->save();
    session()->forget('last_reviewed_announce');
    return redirect()->route('revisor.index');
}
}