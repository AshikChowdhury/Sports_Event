<?php

namespace App\Models\Employee\Traits\Relationship;

use App\Models\Auth\SocialAccount;
use App\Models\Auth\User;
use App\Models\System\Session;

/**
 * Class TransEventRelationship.
 */
trait EmployeeRelationship
{
    public function user(){
        return $this->hasOne(User::class);
    }
}
