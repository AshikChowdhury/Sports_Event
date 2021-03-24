<?php

namespace App\Models\TransEvent\Traits\Relationship;

use App\Models\Auth\SocialAccount;
use App\Models\Schedule\Schedule;
use App\Models\Sponsor\Sponsor;
use App\Models\System\Session;
use App\Models\Team\Team;

/**
 * Class TransEventRelationship.
 */
trait TransEventRelationship
{
//    public function team(){
//        return $this->hasMany(Team::class);
//    }
//
//    public function sponsor(){
//        return $this->hasMany(Sponsor::class);
//    }

    public function schedule(){
        return $this->hasMany(Schedule::class,'event_id','id');
    }

    public function team(){
        return $this->belongsToMany(Team::class, 'event_team', 'event_id');
    }

    public function sponsor(){
        return $this->belongsToMany(Sponsor::class, 'event_sponsor','event_id');
    }
}
