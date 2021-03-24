<?php

namespace App\Models\Match\Traits\Scope;

/**
 * Class MatchScope.
 */
trait MatchScope
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
