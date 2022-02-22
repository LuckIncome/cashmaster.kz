<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $guarded = [];

    public function products()
    {
      return $this->belongsToMany(product::class);
    }
    public function parent(){
      return $this->belongsTo(self::class, 'parent_id');
    }

    public function children(){
        return $this->hasMany(self::class, 'parent_id');
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
