<?php

namespace App\Models\References;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Модель обслуживания списка видов трудовых отношений
 */

class EmploymentTypes extends Model
{
    use SoftDeletes;
}
