<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $table = 'content';

    protected $fillable = [
    	'name',
    	'author',
    	'cover',
    	'description',
    	'price',
    	'release_date',
    	'type',
    	'file',
    ];
}
