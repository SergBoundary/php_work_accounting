<?php

namespace App\Http\Requests\References;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class FamilyRelationTypesCreateRequest: Правила записи списка видов степени родства
 *
 * @author SeBo
 *
 * @package App\Http\Requests
 */
class FamilyRelationTypesCreateRequest extends FormRequest {

    /**
     * Создает реквест, если пользователь авторизован.
     *
     * @return bool
     */
    public function authorize() {
        return auth()->check();
    }

    /**
     * Получает правила проверки данных для реквеста.
     *
     * @return array
     */
    public function rules() {
        return [
            'title' => 'required|string|max:50',
        ];
    }
}