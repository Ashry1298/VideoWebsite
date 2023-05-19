<?php

namespace App\Models;

use App\Models\User;
use App\Models\Skill;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Video extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'meta_keywords',
        'meta_description',
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

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function scopePublished()
    {
        return $this->where('published',1);
    }
}
