<?php

namespace App\Models\Member\Traits\Scope;

/**
 * Class TransEventScope.
 */
trait MemberScope
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
