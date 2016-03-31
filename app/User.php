<?php

namespace App;

use App\Models\Follower;
use App\Models\Like;
use App\Models\Status;
use App\Models\Wishlist;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{

    protected $table = 'usuario_usuario';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'alias', 'email', 'password', 'referido_id', 'tipo_id',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Set Capital letter to Alias attribute
     * @param $value
     * @return string
     */
    public function getAliasAttribute($value) {
        return ucfirst($value);
    }


    /**
     * A user has many statuses
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function statuses() {
        return $this->hasMany('App\Models\Status', 'author_id');
    }

    /**
     * A user has many comments
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comment() {
        return $this->hasMany('App\Models\Comment', 'author_id');
    }

    /**
     * A user has many likes
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function like() {
        return $this->hasMany('App\Models\Like', 'author_id');
    }

    public function follows() {
        return $this->belongsToMany('App\User', 'followers', 'user', 'is_following');
    }
    public function followers() {
        return $this->belongsToMany('App\User', 'followers', 'is_following', 'user');
    }

    /**
     * Save profile picture to user model
     * @param $photo_name
     */
    public function addPhoto($photo_name) {
        $this->photo = "/img/profile-pictures/{$photo_name}";
        $this->save();
    }

    public function wishlist() {
        return $this->hasMany('App\Models\Wishlist', 'user_id');
    }

    /**
     * Check if a user likes something
     * @param $id
     * @return bool
     */
    public function isLikedByMe($id) {
        $like = Like::where('belongs_id', $id)->where('author_id', Auth::id())->first();
        if (!$like) {
            return false;
        }
        return true;
    }

    public function scopeSearchByKeyword($query, $keyword) {
        return $query->where('alias', $keyword)->orWhere('email', $keyword);
    }

    public function isFollowing($id) {
        $following = Follower::where('user', '=', $this->id)->where('is_following', '=', $id)->first();
        if (!$following) {
            return false;
        }
        return true;
    }

    public function isReading($id) {
        $wishlist = Wishlist::where('user_id', '=', $this->id)->where('content_id', '=', $id)->first();
        if (!$wishlist) {
            return false;
        }
        return true;
    }

}
