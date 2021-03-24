<?php

namespace App\Models\Post\Traits\Scope;

/**
 * Class MatchScope.
 */
trait PostScope
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
