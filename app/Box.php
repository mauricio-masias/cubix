<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    protected $primaryKey = 'box_id';
    protected $fillable = ['box_name','box_content','box_active'];
}
