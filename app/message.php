<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class message extends Model
{
    protected $fillable = ['from' , 'to' , 'deleted_by' , 'message' ,   'is_read' ];
}
