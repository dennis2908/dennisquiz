<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class answer extends Model
{
    public $table = 'answers';	
	
    protected $fillable = [
        'type', 'answer'
    ];
}
