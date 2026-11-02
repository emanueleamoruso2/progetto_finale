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
$query = Announce::where('is_accepted', true)
->with(['category', 'user'])
->latest();

if ($this->categoryId !== null) {
$query->where('category_id', $this->categoryId);
}

if ($this->limit) {
$query->take($this->limit);
}


$page = $this->page;

if (strlen(trim($this->search)) >= 3) {

    $ids = Announce::search(trim($this->search))
        ->get()
        ->pluck('id');

    $query->whereIn('id', $ids);
}
$announces = $query->get();

return view(
'livewire.card-announce',
compact('announces', 'page')
);
}
}