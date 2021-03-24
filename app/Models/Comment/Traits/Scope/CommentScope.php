<?php

namespace App\Models\Comment\Traits\Scope;

/**
 * Class MatchScope.
 */
trait CommentScope
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
