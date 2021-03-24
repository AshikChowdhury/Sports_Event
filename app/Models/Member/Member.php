<?php

namespace App\Models\Member;

use App\Models\Member\Traits\Attribute\MemberAttribute;
use App\Models\Member\Traits\Event\MemberEvent;
use App\Models\Member\Traits\Relationship\MemberRelationship;
use App\Models\Member\Traits\Scope\MemberScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model
{
    use
        SoftDeletes,
        MemberAttribute,
        MemberEvent,
        MemberRelationship,
        MemberScope;

    protected $guarded = ['id'];
}