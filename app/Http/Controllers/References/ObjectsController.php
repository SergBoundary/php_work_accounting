<?php

namespace App\Http\Controllers\References;

use Illuminate\Http\Request;
use App\Models\References\ObjectGroups;
use App\Models\References\Objects;
use App\Repositories\References\ObjectsRepository;
use App\Http\Requests\References\ObjectsCreateRequest;
use App\Http\Requests\References\ObjectsUpdateRequest;

/**
 * Class ObjectsController: Контроллер списка объектов
 *
 * @author SeBo
 *
 * @package App\Http\Controllers\References
 */
class ObjectsController extends BaseReferencesController {

    /**
     * @var ObjectsRepository
     */
    private $objectsRepository;

    /**
     * @var path
     */
    private $path = 'ref/objects';

    public function __construct() {

        parent::__construct();

        $this->objectsRepository = app(ObjectsRepository::class);

    }

    /**
     * Метод создания краткого табличного представления
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        // Формируем массив подменю выбранного пункта меню
        $menu = $this->createMenu($this->path);
        if(empty($menu)) {
            return view('guest');
        }
        // Формируем массив данных о представлении
        $title = $menu->where('path', $this->path)
                ->first();

        $objectsList = $this->objectsRepository->getTable();

        return view('ref.objects.index',  
               compact('menu', 'title', 'objectsList'));
    }

    /**
     * Метод создания полного представления существющей записи
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id) {

        // Формируем массив подменю выбранного пункта меню
        $menu = $this->createMenu($this->path);
        if(empty($menu)) {
            return view('guest');
        }
        // Формируем массив данных о представлении
        $title = $menu->where('path', $this->path)
                ->first();

        // Формируем содержание списка заполняемых полей input
        $objectsList = $this->objectsRepository->getShow($id);

        return view('ref.objects.show', 
               compact('menu', 'title', 'objectsList'));
    }

    /**
     * Метод создания представления новой записи
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        // Формируем массив подменю выбранного пункта меню
        $menu = $this->createMenu($this->path);
        if(empty($menu)) {
            return view('guest');
        }
        // Формируем массив данных о представлении
        $title = $menu->where('path', $this->path)
                ->first();

        // Формируем содержание списка выбираемых полей полей select
        $objectGroupsList = $this->objectsRepository->getListSelect(0);

        return view('ref.objects.create', 
               compact('menu', 'title', 
                      'objectGroupsList'));
    }

    /**
     * Метод сохранения созданной новой записи
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ObjectsCreateRequest $request) {

        $data = $request->input();

        $result = (new Objects($data))->create($data);

        if($result) {
            return redirect()
                ->route('ref.objects.edit', $result->id)
                ->with(['success' => "Успешно сохранено"]);
        } else {
            return back()
                ->withErrors(['msg' => "Ошибка сохранения.."])
                ->withInput();
        }
    }

    /**
     * Метод создания представления изменения
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {

        // Формируем массив подменю выбранного пункта меню
        $menu = $this->createMenu($this->path);
        if(empty($menu)) {
            return view('guest');
        }
        // Формируем массив данных о представлении
        $title = $menu->where('path', $this->path)
                ->first();

        // Формируем содержание списка выбираемых полей полей select
        $objectGroupsList = $this->objectsRepository->getListSelect(0);

        // Формируем содержание списка заполняемых полей input
        $objectsList = $this->objectsRepository->getEdit($id);

        return view('ref.objects.edit', 
               compact('menu', 'title', 
                      'objectGroupsList', 
                      'objectsList'));
    }

    /**
     * Обновление данных полей измененной записи
     *
     * @return \Illuminate\Http\Response
     */
    public function update(ObjectsUpdateRequest $request, $id) {

        $item = $this->objectsRepository->getEdit($id);
        if(empty($item)) {
            return back()
                ->withErrors(['msg' => "Запись #{$id} не найдена.."])
                ->withInput();
        }
        $data = $request->all();
        $result = $item->update($data);
        if($result) {
            return redirect()
                ->route('ref.objects.edit', $item->id)
                ->with(['success' => "Успешно сохранено"]);
        } else {
            return back()
                ->withErrors(['msg' => "Ошибка сохранения.."])
                ->withInput();
        }
    }

    /**
     * Удаление выбранной записи
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {

        $result = $this->objectsRepository->getEdit($id)->forceDelete();

        if($result) {
            return redirect()
                ->route('ref.objects.index')
                ->with(['success' => "Успешно сохранено"]);
        } else {
            return back()
                ->withErrors(['msg' => "Ошибка сохранения.."])
                ->withInput();
        }
    }
}