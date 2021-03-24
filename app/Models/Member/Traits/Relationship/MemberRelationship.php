<?php

namespace App\Models\Member\Traits\Relationship;

use App\Models\Team\Team;
use App\Models\TransEvent\TransEvent;

/**
 * Class TeamRelationship.
 */
trait MemberRelationship
{
    public function transevent(){
        return $this->belongsTo(TransEvent::class);
    }

    public function team(){
        return $this->belongsTo(Team::class);
    }
}
