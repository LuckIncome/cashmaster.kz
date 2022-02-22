<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roltest extends Model
{
    protected $guarded = [];

    public function Roltest()
    {
      return $this->belongsToMany(Roltest::class);
    }    
}
