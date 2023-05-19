<?php

namespace App\Models;

use App\Models\Video;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'meta_keywords',
        'meta_description'
    ];
    public function videos()
    {
        return $this->hasMany(Video::class);
    }
}
