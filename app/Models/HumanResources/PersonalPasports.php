<?php

namespace App\Models\HumanResources;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Модель обслуживания учета паспортов работника
 */

class PersonalPasports extends Model
{
    use SoftDeletes;
}
