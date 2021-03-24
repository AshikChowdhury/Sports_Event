<?php

namespace App\Models\Match;

use App\Models\Match\Traits\Attribute\MatchAttribute;
use App\Models\Match\Traits\Event\MatchEvent;
use App\Models\Match\Traits\Relationship\MatchRelationship;
use App\Models\Match\Traits\Scope\MatchScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Match extends Model
{
    use
        SoftDeletes,
        MatchAttribute,
        MatchEvent,
        MatchRelationship,
        MatchScope;

    protected $guarded = ['id'];
}
