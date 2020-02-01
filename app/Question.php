<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable =['title', 'body'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function setTitleAtribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = str::slug($value);
    }
    public function getUrlAttribute()
    {
        return route("questions.show", $this->id);
    }
    public function getCreateDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }
}
