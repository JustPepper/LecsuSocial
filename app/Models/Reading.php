<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reading extends Model
{
    protected $fillable = ['user_id', 'content_id'];

    public function content() {
    	$this->belongsTo('app\Models\Reading', 'content_id');
    }
}
