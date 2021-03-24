<?php

namespace App\Models\TransEvent\Traits\Scope;

/**
 * Class TransEventScope.
 */
trait TransEventScope
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
