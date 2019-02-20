<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
     protected $primaryKey = 'menu_id';
    protected $fillable = ['menu_text','menu_type','menu_link','menu_parent','menu_outbound','menu_order','menu_active'];
}
