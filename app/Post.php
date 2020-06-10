<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'body', 'image', 'user_id'];

    public function getImageAttribute()
    {
        return $this->attributes['image'] ? "/storage/" . $this->attributes['image'] : 'https://d2cstorage-a.akamaihd.net/atl/option3/MKhsaxsd31RL2r6PmUPDATE/FsdGVkX18NfCX7U2FsdGVkNms.jpg';
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class)->withTimestamps();
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
