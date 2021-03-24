<?php

namespace App\Models\Member\Traits\Event;

use Carbon\Carbon;

/**
 * Trait TransEventMethod.
 */
trait MemberEvent
{
    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->created_by = auth()->user() ? auth()->user()->id : 0;
            $model->created_at = Carbon::now();
        });
        self::created(function ($model) {
            logger()->info('New Event Created ID ('.$model->id.')!');
        });


        self::updating(function ($model) {
            $model->updated_by = auth()->user() ? auth()->user()->id : 0;
            $model->updated_at = Carbon::now();
        });
        self::updated(function ($model) {
            logger()->info('New Event Updated!');
        });


        self::deleting(function ($model) {
            $model->deleted_by = auth()->user()->id;
            $model->deleted_at = Carbon::now();
        });
        self::deleted(function ($model) {
            logger()->info('New Event Deleted!');
        });
    }

}
