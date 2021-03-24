<?php

namespace App\Models\Schedule\Traits\Scope;

/**
 * Class TransEventScope.
 */
trait ScheduleScope
{

    /**
     * @param $query
     * @param bool $status
     *
     * @return mixed
     */
    public function scopeActive($query, $status = true)
    {
        return $query->where('status', $status);
    }
}
