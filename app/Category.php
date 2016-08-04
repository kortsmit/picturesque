<?php

namespace Picturesque;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $table = 'categories';

    /**
     * The accessors to append to the model's array/JSON form.
     *
     * @var array
     */
    protected $appends = ['removed', 'removing', 'undoing'];

    /**
     * Get the removed flag for the Category.
     * Used by picturesque-category.vue to track if the category has been
     * removed/deleted.
     *
     * @return bool
     */
    public function getRemovedAttribute()
    {
        return false;
    }

    /**
     * Get the removing flag for the Category.
     * Used by picturesque-category.vue to track if the category is in the
     * process of being removed.
     *
     * @return bool
     */
    public function getRemovingAttribute()
    {
        return false;
    }

    /**
     * Get the undoing flag for the Category.
     * Used by picturesque-category.vue to track if the category's removal
     * is in the process of being undone.
     *
     * @return bool
     */
    public function getUndoingAttribute()
    {
        return false;
    }

}
