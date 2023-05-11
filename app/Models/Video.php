<?php

namespace App\Models;

use App\Models\User;
use App\Models\Skill;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Video extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'meta-keywords',
        'meta-description',
        'description',
        'youtube',
        'published',
        'user_id',
        'category_id',
        'image',

    ];
    public function user()
    {
       return $this->belongsTo(User::class); 
    }
    public function category()
    {
       return $this->belongsTo(Category::class); 
    }

    public function skills()
    {
        return $this->belongsToMany('App\Models\Skill');
    }
    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag');
    }
}
