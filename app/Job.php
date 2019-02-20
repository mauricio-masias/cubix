<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $primaryKey = 'job_id';
    protected $fillable = ['job_name','job_url','job_order','job_description','job_title','job_range','box_active'];
}
