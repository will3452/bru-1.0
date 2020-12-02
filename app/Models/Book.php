<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public function scopeFilterByClass($q, $cmd){
        return $q->where('class', $cmd);
    }

    public function chapters(){
        return $this->hasMany(Chapter::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
