<?php

namespace App\Models\Employee;

use App\Models\Employee\Traits\Attribute\EmployeeAttribute;
use App\Models\Employee\Traits\Event\EmployeeEvent;
use App\Models\Employee\Traits\Relationship\EmployeeRelationship;
use App\Models\Employee\Traits\Scope\EmployeeScope;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use
        SoftDeletes,
        EmployeeAttribute,
        EmployeeEvent,
        EmployeeRelationship,
        EmployeeScope;

    protected $guarded = ['id'];
}
