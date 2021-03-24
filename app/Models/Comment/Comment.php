<?php

namespace App\Models\Comment;

use App\Models\Comment\Traits\Attribute\CommentAttribute;
use App\Models\Comment\Traits\Event\CommentEvent;
use App\Models\Comment\Traits\Relationship\CommentRelationship;
use App\Models\Comment\Traits\Scope\CommentScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use
        SoftDeletes,
        CommentAttribute,
        CommentEvent,
        CommentRelationship,
        CommentScope;

    protected $guarded = ['id'];
}