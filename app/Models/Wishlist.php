<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $table = 'wishlist';

    public function content() {
    	return $this->belongsTo('App\Models\Content', 'id', 'content_id');
    }

}
