<?php

namespace App\Models\HumanResources;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class MigrationStatuses: Модель учета миграционного статуса работника в стране
 *
 * @author SeBo
 */
class MigrationStatuses extends Model {

    use SoftDeletes;

    protected $fillable = [
        'personal_card_id',
        'country_id',
        'status_old',
        'status_new',
        'opening_reason',
        'submitted',
        'incomplete',
        'decision_number',
        'decision_date',
        'date_opening',
        'date_closing',
        'closing_reason',
    ];
}