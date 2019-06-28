<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = 'media';

    protected $fillable = ['file_name','file_size','file_mime','file_path','created_by'];

    public function gallery(){

        return $this->belongsTo('App\Gallery');
    }
}
