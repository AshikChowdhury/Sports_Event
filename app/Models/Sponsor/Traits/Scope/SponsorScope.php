<?php

namespace App\Models\Sponsor\Traits\Scope;

/**
 * Class TransEventScope.
 */
trait SponsorScope
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
