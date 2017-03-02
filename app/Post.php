<?php

namespace Picturesque;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $table = 'posts';

    protected $fillable = [
        'id',
        'user_id',
        'category_id',
        'title',
        'slug',
        'description',
        'text',
        'published'
    ];

    /**
     * The accessors to append to the model's array/JSON form.
     *
     * @var array
     */
    protected $appends = ['removed', 'removing', 'undoing'];

    /**
     * Get the removed flag for the Branch.
     * Used by picturesque-post.vue to track if the post has been
     * removed/deleted.
     *
     * @return bool
     */
    public function getRemovedAttribute()
    {
        return false;
    }

    /**
     * Get the removing flag for the Post.
     * Used by picturesque-post.vue to track if the post is in the
     * process of being removed.
     *
     * @return bool
     */
    public function getRemovingAttribute()
    {
        return false;
    }

    /**
     * Get the undoing flag for the Post.
     * Used by picturesque-post.vue to track if the post's removal
     * is in the process of being undone.
     *
     * @return bool
     */
    public function getUndoingAttribute()
    {
        return false;
    }

    /**
     * Query scope to select published posts.
     *
     * @param $query
     * @return mixed
     */
    public function scopePublished($query)
    {
        return $query->where('published', 1);
    }

    /**
     * Query scope to select posts in draft status.
     *
     * @param $query
     * @return mixed
     */
    public function scopeDrafts($query)
    {
        return $query->where('published', 0);
    }

}
