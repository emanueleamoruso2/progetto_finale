<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;

class Announce extends Model
{
    use Searchable;

    protected $fillable = [
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

    public function toSearchableArray(): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'category' => $this->category,
        ];
    }

    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }

    public function setAccepted($value)
    {
        $this->is_accepted = $value;
    }

    public static function toBeRevisedCount()
    {
        return Announce::where('is_accepted', null)->count();
    }
}