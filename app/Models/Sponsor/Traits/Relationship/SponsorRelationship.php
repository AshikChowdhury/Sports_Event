<?php

namespace App\Models\Sponsor\Traits\Relationship;

use App\Models\TransEvent\TransEvent;

/**
 * Class SponsorRelationship.
 */
trait SponsorRelationship
{
    public function transevent(){
       return $this->belongsToMany(TransEvent::class);
    }
}
