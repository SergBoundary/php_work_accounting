<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClothingSizesTable extends Migration
{
    /**
     * Run the migrations: Справочник. Список размеров одежды
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clothing_sizes', function (Blueprint $table) {
            $table->increments('id'); // ID записи
            $table->char('title', 20)->unique(); // Номер размера одежды
            $table->timestamps(); // Поля с датой создания и датой изменения записи
            $table->softDeletes(); // Поле с датой удаления (исключения) записи из обслуживания
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clothing_sizes');
    }
}
