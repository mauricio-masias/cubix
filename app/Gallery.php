<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'galleries';

    protected $fillable = ['name','slug','created_by','active'];

    public function media(){

        return $this->hasMany('App\Media');
    }
}
