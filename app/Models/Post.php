<?php

namespace App\Models;

use App\Models\User;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'name',
        'description',
        'content',
        'slug',
        'image',
        'category_id',
        'outstanding',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
