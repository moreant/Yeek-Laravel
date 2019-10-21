<?php

namespace App;

// use 是必须的
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    // 指定表名
    // protected $table = 'sourse';
    
    // 指定 id
    protected $primaryKey = 'id';

    

}