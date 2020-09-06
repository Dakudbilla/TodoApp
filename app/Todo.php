<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;


use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    //Allow soft deletes
    use SoftDeletes;

}
