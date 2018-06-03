<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 * @package App\Models
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $api_token
 * @property mixed $created_at
 * @property mixed $updated_at
 */
class User extends Authenticatable
{
    use Notifiable;

    /* the api token length */
    public const API_TOKEN_LENGTH = 120;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'api_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'api_token',
    ];

    /**
     * Gets all current user's shortlisted posts.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function shortlistPosts()
    {
        return $this->belongsToMany(Post::class, 'shortlists', 'user_id', 'post_id');
    }
}
