<?php

namespace App\Models\Team\Traits\Relationship;

use App\Models\Member\Member;
use App\Models\TransEvent\TransEvent;

/**
 * Class TeamRelationship.
 */
trait TeamRelationship
{
    public function transevent(){
        return $this->belongsToMany(TransEvent::class);
    }

    public function members(){
        return $this->hasMany(Member::class);
    }
}
