<?php

namespace App\Models\Post;

use App\Models\Post\Traits\Attribute\PostAttribute;
use App\Models\Post\Traits\Event\PostEvent;
use App\Models\Post\Traits\Relationship\PostRelationship;
use App\Models\Post\Traits\Scope\PostScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static findOrFail($id)
 */
class Post extends Model
{
    use
        SoftDeletes,
        PostAttribute,
        PostEvent,
        PostRelationship,
        PostScope;

    protected $guarded = ['id'];
}