<?php

namespace App\Models\Match\Traits\Relationship;

use App\Models\Team\Team;
use App\Models\TransEvent\TransEvent;

/**
 * Class MatchRelationship.
 */
trait MatchRelationship
{
    public function transevent(){
        return $this->belongsTo(TransEvent::class,'event_id','id');
    }

    public function team_1(){
        return $this->hasOne(Team::class, 'id', 'team1');
    }
    public function team_2(){
        return $this->hasOne(Team::class, 'id', 'team2');
    }
}
