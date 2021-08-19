<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'description',
        'image',
        'available'
    ];

    public function getImageUrlAttribute(): string
    {
        return Str::startsWith($this->image, 'http')
            ? $this->image
            : Storage::disk('public')->url($this->image);
    }
}
