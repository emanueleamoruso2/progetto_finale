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
->latest();

if ($this->categoryId !== null) {
$query->where('category_id', $this->categoryId);
}

if ($this->search) {

$search = mb_strtolower(trim($this->search));

$wildcard = '%' . $search . '%';

$query->where(function ($query) use ($search, $wildcard) {

$query->whereFullText(
['title', 'description'],
$search . '*',
['mode' => 'boolean']
)->orWhereRaw(
'LOWER(title) LIKE ?',
[$wildcard]
)->orWhereRaw(
'LOWER(description) LIKE ?',
[$wildcard]
)->orWhereHas('category', function ($query) use ($search, $wildcard) {
$query->whereFullText(
'name',
$search . '*',
['mode' => 'boolean']
)->orWhereRaw(
'LOWER(name) LIKE ?',
[$wildcard]
);
});
});
}

if ($this->limit) {
$query->take($this->limit);
}

$announces = $query->get();

$page = $this->page;

return view(
'livewire.card-announce',
compact('announces', 'page')
);
}
}