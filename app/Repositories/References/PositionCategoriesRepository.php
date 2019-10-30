<?php

namespace App\Repositories\References;

use App\Models\References\PositionCategories as Model;
use Illuminate\Database\Eloquent\Collection;
use App\Repositories\CoreRepository;

/**
 * Class PositionCategoriesRepository: Репозиторий списка категорий должностей
 *
 * @author SeBo
 *
 * @package App\Repositories\References
 */
class PositionCategoriesRepository extends CoreRepository {

    /**
     * @return string
     */
    protected function getModelClass() {

        return Model::class;
    }

    /**
     * Получить список данных
     *
     * @param arr $id
     *
     * @return Collection
     */
    public function getTable() {

        $result = $this->startConditions()
            ->select('position_categories.title', 'position_categories.id')
            ->orderBy('position_categories.title')
            ->get();
        return $result;
    }

    /**
     * Получить модель для представления данных одной записи
     *
     * @param int $id
     *
     * @return Model
     */
    public function getShow($id) {

        $result = $this->startConditions()
            ->select('position_categories.title', 'position_categories.id')
            ->where('position_categories.id', $id)
            ->toBase()
            ->first();

        return $result;
    }

    /**
     * Получить модель для редактирования данных одной записи
     *
     * @param int $id
     *
     * @return Model
     */
    public function getEdit($id) {

        $columns = ['id', 'title', ];

        $result = $this->startConditions()
            ->select($columns)
            ->find($id);

        return $result;
    }

}