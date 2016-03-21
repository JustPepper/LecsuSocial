<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Status extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'body',
        'type',
    ];

    /**
     * A status belongs to a user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author() {
    	return $this->belongsTo('App\User');
    }

    /**
     * A status has many comments
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function comments() {
        return $this->morphMany('App\Models\Comment', 'parent');
    }

    public function likes() {
        return $this->morphMany('App\Models\Like', 'belongs');
    }

    /**
     * Make author an object
     * @return mixed
     */
    public function getAuthorAttribute() {
    	return $this->author()->first();
    }

    public function checkLike() {
        $status = $this->likes()->where('author_id', Auth::id())->first();
        if (!$status) {
            return false;
        }
        return true;
    }

}
