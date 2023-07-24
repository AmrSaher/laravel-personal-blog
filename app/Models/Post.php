<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'text',
        'image_path'
    ];

    public function categories() : BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }
}
