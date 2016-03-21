<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    /**
     * A like belongs to a Status, Comment
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function belongs() {
    	return $this->morphTo();
    }
}
