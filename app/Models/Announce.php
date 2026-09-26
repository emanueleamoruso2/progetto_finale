<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
