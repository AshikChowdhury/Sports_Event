<?php

namespace App\Models\Team\Traits\Scope;

/**
 * Class TransEventScope.
 */
trait TeamScope
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
