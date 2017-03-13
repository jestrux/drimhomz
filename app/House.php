<?php

namespace App;

use App\Favorite;
use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    protected $fillable = [
        'title', 'image_url', 'placeholder_color', 'description', 'user_id', 'project_id'
    ];

    public function project(){
        return $this->belongsTo('App\Project');
    }

    public function owner(){
        return $this->project->user;
    }

    public function categories(){
        return $this->hasMany("App\Category");
    }

    public function comments(){
        return $this->hasMany("App\Comment");
    }

    public function favorites(){
        return $this->hasMany("App\Favorite");
    }

    public function faved($uid){
        return Favorite::where(
            array('house_id' => $this->id, 'user_id' => $uid))->exists();
    }
}