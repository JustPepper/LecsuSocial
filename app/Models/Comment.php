<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Comment extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['body'];


    /**
     * A comment belogns to a Status or Comment
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function parent() {
    	return $this->morphTo();
    }

    /**
     * A comment belons to a user   
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author() {
    	return $this->belongsTo('App\User');
    }

    /**
     * A comment has many replies
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function replies() {
        return $this->morphMany('App\Models\Comment', 'parent');
    }

    /**
     * A comment has many replies
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function likes() {
        return $this->morphMany('App\Models\Like', 'belongs');
    }

    public function checkLike() {
        $comment = $this->likes()->where('author_id', Auth::id())->first();
        if (!$comment) {
            return false;
        }
        return true;
    } 

}
