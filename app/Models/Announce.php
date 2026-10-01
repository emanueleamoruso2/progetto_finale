<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Builder;

class Announce extends Model
{
protected $fillable=[
'title',
'price',
'description',
'category_id',
'user_id'
];

public function user()
{
return $this->belongsTo(User::class);
}

public function category()
{
return $this->belongsTo(Category::class);
}

protected function casts(): array
{
return [
'is_accepted' => 'boolean',
'price' => 'decimal:2',
];
}
use Searchable;

public function toSearchableArray(): array
{
return [
'id' => $this->id,
'title' => $this->title,
'description' => $this->description,
'category' => $this->category?->name ?? '',
];
}

public function shouldBeSearchable(): bool
{
return $this->is_accepted == true;
}
protected function makeAllSearchableUsing(Builder $query): Builder
{
return $query->where('is_accepted', true)->with('category');
}
}
