<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Announce;

class CardAnnounce extends Component
{
    public $limit = null;

    public $page = null;

    public $categoryId = null;

    public $search = '';

    public function render()
    {
        $search = trim($this->search);

        $query = Announce::where('is_accepted', true)
            ->with(['category', 'user'])
            ->latest();

        if ($this->categoryId !== null) {
            $query->where('category_id', $this->categoryId);
        }

        if ($search !== '') {

            $announces = Announce::search($search)
                ->constrain($query)
                ->get();

        } else {

            if ($this->limit) {
                $query->take($this->limit);
            }

            $announces = $query->get();
        }

        $page = $this->page;

        return view(
            'livewire.card-announce',
            compact('announces', 'page')
        );
    }
}