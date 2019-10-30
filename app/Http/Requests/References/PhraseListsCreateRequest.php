<?php

namespace App\Http\Requests\References;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class PhraseListsCreateRequest: Правила записи списка формулировок для заполнения документов и форм 
 *
 * @author SeBo
 *
 * @package App\Http\Requests
 */
class PhraseListsCreateRequest extends FormRequest {

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
            'phrase_group_id' => 'required|integer|exists:phrase_list_groups,id',
            'title' => 'required|string|max:100',
        ];
    }
}