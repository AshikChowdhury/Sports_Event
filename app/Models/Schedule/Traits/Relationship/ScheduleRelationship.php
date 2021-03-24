<?php

namespace App\Models\Schedule\Traits\Relationship;

use App\Models\Auth\SocialAccount;
use App\Models\Sponsor\Sponsor;
use App\Models\System\Session;
use App\Models\Team\Team;
use App\Models\TransEvent\TransEvent;

/**
 * Class TransEventRelationship.
 */
trait ScheduleRelationship
{
    public function transevent(){
        return $this->belongsTo(TransEvent::class);
    }

}
