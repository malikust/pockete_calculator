<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Calc extends Model
{
    protected $table = 'pockete_calc';
    protected $fillable = [
        'user_id','name', 'expression', 'result','created_at','updated_at'
    ];


}
