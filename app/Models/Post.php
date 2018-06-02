<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Post
 * @package App\Models
 * @property int $id
 * @property string $title
 * @property mixed $date
 * @property string $description
 * @property string $link
 * @property array|null images
 * @property array|null details
 * @property mixed $created_at
 */
class Post extends Model
{
    /**
     * Set the auto timestamps to false, since we are using our own timestamp here.
     *
     * @var bool $timestamps
     */
    public $timestamps = false;

    /**
     * The fillable fields.
     *
     * @var array $fillable
     */
    protected $fillable = [
        'title', 'date', 'description', 'link', 'images', 'details',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array $casts
     */
    protected $casts = [
        'images' => 'array',
        'details' => 'array',
    ];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    public static function boot()
    {
        /* call parent boot method */
        parent::boot();

        /* set created at to now */
        static::creating(function ($post) {
            $post->created_at = $post->freshTimestamp();
        });
    }
}
