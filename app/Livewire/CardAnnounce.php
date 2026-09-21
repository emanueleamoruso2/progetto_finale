<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Announce;

class CardAnnounce extends Component
{
  
    public function render()
    {
        $announces= Announce::all();
        return view('livewire.card-announce',compact('announces'));
    }
}