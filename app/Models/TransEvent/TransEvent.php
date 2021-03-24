<?php

namespace App\Models\TransEvent;

use App\Models\TransEvent\Traits\Attribute\TransEventAttribute;
use App\Models\TransEvent\Traits\Event\TransEventEvent;
use App\Models\TransEvent\Traits\Relationship\TransEventRelationship;
use App\Models\TransEvent\Traits\Scope\TransEventScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransEvent extends Model
{
    use
        SoftDeletes,
        TransEventAttribute,
        TransEventEvent,
        TransEventRelationship,
        TransEventScope;

    protected $guarded = ['id'];

}