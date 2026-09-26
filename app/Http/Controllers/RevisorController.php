<?php

namespace App\Http\Controllers;

use App\Models\Announce;

class RevisorController extends Controller
{
    public function index()
    {
        $announce = Announce::whereNull('is_accepted')
            ->oldest()
            ->first();
        $count = Announce::whereNull('is_accepted')->count();
        return view('revisor.index', compact('announce', 'count'));
    }
    public function accept(Announce $announce)
{
    session()->put('last_reviewed_announce', $announce->id);
    $announce->is_accepted = true;
    $announce->save();
    return redirect()->route('revisor.index');
}

public function reject(Announce $announce)
{
    session()->put('last_reviewed_announce', $announce->id);
    $announce->is_accepted = false;
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
    $announce->is_accepted = null;
    $announce->save();
    session()->forget('last_reviewed_announce');
    return redirect()->route('revisor.index');
}
}