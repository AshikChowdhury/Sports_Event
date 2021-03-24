<?php

namespace App\Models\Schedule;

use App\Models\Schedule\Traits\Attribute\ScheduleAttribute;
use App\Models\Schedule\Traits\Event\ScheduleEvent;
use App\Models\Schedule\Traits\Relationship\ScheduleRelationship;
use App\Models\Schedule\Traits\Scope\ScheduleScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
    use
        SoftDeletes,
        ScheduleAttribute,
        ScheduleEvent,
        ScheduleRelationship,
        ScheduleScope;

    protected $guarded = ['id'];
}
