<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $primaryKey = 'project_id';
    protected $fillable = ['project_name','project_url','project_image','project_teaser','project_text','project_categories'];

    
}
