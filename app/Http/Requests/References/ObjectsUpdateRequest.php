<?php

namespace App\Http\Requests\References;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ObjectsUpdateRequest: Правила записи списка объектов
 *
 * @author SeBo
 *
 * @package App\Http\Requests
 */
class ObjectsUpdateRequest extends FormRequest {

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
            'object_group_id' => 'required|integer|exists:object_groups,id',
            'title' => 'required|string|max:255',
            'abbr' => 'required|string|max:10',
        ];
    }
}