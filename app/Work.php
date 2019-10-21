<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Work extends Model
{ 
    public function course()
    {
        return $this->belongsTo('App\Course');
    }
}
