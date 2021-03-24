<?php

namespace App\Models\Post\Traits\Relationship;

use App\Models\Auth\User;
use App\Models\Comment\Comment;
use App\Models\TransEvent\TransEvent;

/**
 * Class MatchRelationship.
 */
trait PostRelationship
{
    public function transevent(){
        return $this->belongsTo(TransEvent::class,'event_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class,'created_by','id');
    }

    public function comments(){
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }
}
