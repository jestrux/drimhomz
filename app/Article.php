<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title', 'content', 'user_id'
    ];

    public function comments(){
        return $this->hasMany("App\ArticleComment");
    }

    public function user(){
        return $this->belongsTo("App\User");
    }
}
