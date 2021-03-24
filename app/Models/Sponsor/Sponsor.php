<?php

namespace App\Models\Sponsor;

use App\Models\Sponsor\Traits\Attribute\SponsorAttribute;
use App\Models\Sponsor\Traits\Event\SponsorEvent;
use App\Models\Sponsor\Traits\Relationship\SponsorRelationship;
use App\Models\Sponsor\Traits\Scope\SponsorScope;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    use
        SoftDeletes,
        SponsorAttribute,
        SponsorEvent,
        SponsorRelationship,
        SponsorScope;

    protected $guarded = ['id'];
}
