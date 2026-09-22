<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Announce;

class CardAnnounce extends Component
{
    public $limit = null;

    public $page = null;

    public $categoryId = null;

    public function render()
    {
        $query = Announce::latest();

        if ($this->categoryId !== null) {
            $query->where('category_id', $this->categoryId);
        }

        if ($this->limit) {
            $query->take($this->limit);
        }

        $announces = $query->get();

        $page = $this->page;

        return view('livewire.card-announce', compact('announces', 'page'));
    }
}