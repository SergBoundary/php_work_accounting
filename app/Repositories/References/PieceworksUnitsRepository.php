<?php

namespace App\Repositories\References;

use App\Models\References\PieceworksUnits as Model;
use Illuminate\Database\Eloquent\Collection;
use App\Repositories\CoreRepository;

/**
 * Class PieceworksUnitsRepository: Репозиторий списка единиц изменерия сдельных работ
 *
 * @author SeBo
 *
 * @package App\Repositories\References
 */
class PieceworksUnitsRepository extends CoreRepository {

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
            ->select('pieceworks_units.title', 'pieceworks_units.id')
            ->orderBy('pieceworks_units.title')
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
            ->select('pieceworks_units.title', 'pieceworks_units.id')
            ->where('pieceworks_units.id', $id)
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