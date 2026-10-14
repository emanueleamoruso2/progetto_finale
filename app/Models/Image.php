<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    protected $fillable = [
        'path',
    ];

    public function announce(): BelongsTo
    {
        return $this->belongsTo(Announce::class);
    }

    public static function getUrlByFilePath($filePath, $w = null, $h = null)
    {
        if (!$w && !$h) {
            return Storage::url($filePath);
        }

        $path = dirname($filePath);
        $fileName = basename($filePath);

        $croppedFile = "{$path}/crop_{$w}x{$h}_{$fileName}";

        if (Storage::disk('public')->exists($croppedFile)) {
            return Storage::url($croppedFile);
        }

        return Storage::url($filePath);
    }

    public function getUrl($w = null, $h = null)
    {
        return self::getUrlByFilePath(
            $this->path,
            $w,
            $h
        );
    }
}