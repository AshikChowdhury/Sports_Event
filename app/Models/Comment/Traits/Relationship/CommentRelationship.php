<?php

namespace App\Models\Comment\Traits\Relationship;

use App\Models\Auth\User;
use App\Models\Post\Post;
use App\Models\TransEvent\TransEvent;

/**
 * Class MatchRelationship.
 */
trait CommentRelationship
{
    public function user(){
        return $this->belongsTo(User::class,'created_by','id');
    }

    public function post(){
        return $this->belongsTo(Post::class,'post_id','id');
    }
}
