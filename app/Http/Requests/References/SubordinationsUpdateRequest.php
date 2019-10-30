<?php

namespace App\Http\Requests\References;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class SubordinationsUpdateRequest: Правила записи списка уровней должностей
 *
 * @author SeBo
 *
 * @package App\Http\Requests
 */
class SubordinationsUpdateRequest extends FormRequest {

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