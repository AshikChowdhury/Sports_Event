<?php

namespace App\Models\Employee\Traits\Scope;

/**
 * Class TransEventScope.
 */
trait EmployeeScope
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
