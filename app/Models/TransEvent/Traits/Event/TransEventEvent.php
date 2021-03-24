<?php

namespace App\Models\TransEvent\Traits\Event;

use Carbon\Carbon;

/**
 * Trait TransEventMethod.
 */
trait TransEventEvent
{
    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->created_by = auth()->user()->id;
            $model->created_at = Carbon::now();
        });
        self::created(function ($model) {
            logger()->info('New Event Created ID ('.$model->id.')!');
        });


        self::updating(function ($model) {
            $model->updated_by = auth()->user()->id;
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
