<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
  protected $with = ['organization']; 

   protected $fillable = ['conversation', 'title'];

   protected $hidden = ['remember_token'];

   public function users_post()
    {
        return $this->morphTo();
    }
    public function organization()
    {
    	return $this->belongsTo('App\Organization');
    }
    public function volunteer()
    {
    	return $this->belongsTo('App\Volunteer');
    }
}
