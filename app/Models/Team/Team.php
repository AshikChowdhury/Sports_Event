<?php

namespace App\Models\Team;

use App\Models\Team\Traits\Attribute\TeamAttribute;
use App\Models\Team\Traits\Event\TeamEvent;
use App\Models\Team\Traits\Relationship\TeamRelationship;
use App\Models\Team\Traits\Scope\TeamScope;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use
        SoftDeletes,
        TeamAttribute,
        TeamEvent,
        TeamRelationship,
        TeamScope;

    protected $guarded = ['id'];

}
