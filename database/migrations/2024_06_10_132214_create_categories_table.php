<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            $table->string('section');
            $table->string('type');
            $table->timestamps();
        });

        // Insert categories and sections
        DB::table('categories')->insert([
            ['category' => 'Аксессуары для шитья', 'section' => 'Маркировочный инструмент', 'type' => '', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Аксессуары для шитья', 'section' => 'Маркировочный инструмент', 'type' => 'Маркеры', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Аксессуары для шитья', 'section' => 'Маркировочный инструмент', 'type' => 'Карандаши', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Аксессуары для шитья', 'section' => 'Маркировочный инструмент', 'type' => 'Мел', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Аксессуары для шитья', 'section' => 'Идеи подарков', 'type' => '', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Аксессуары для шитья', 'section' => 'Идеи подарков', 'type' => 'Сувениры', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Аксессуары для шитья', 'section' => 'Лапки', 'type' => 'Лапки для Прямострочная швейная машина', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Аксессуары для шитья', 'section' => 'Лапки', 'type' => 'Лапки для Битовая швейная машина', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Аксессуары для шитья', 'section' => 'Лапки', 'type' => 'Лапки для оверлоков и распошивальных машин', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Аксессуары для шитья', 'section' => 'Нитки', 'type' => 'Нитки для Прямострочная швейная машина', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Аксессуары для шитья', 'section' => 'Нитки', 'type' => 'Нитки для Битовая швейная машина', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Аксессуары для шитья', 'section' => 'Нитки', 'type' => 'Нитки для Оверлоков', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Аксессуары для шитья', 'section' => 'Нитки', 'type' => 'Нитки для вышивания', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Аксессуары для шитья', 'section' => 'Нитки', 'type' => 'Специальные нитки', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Аксессуары для шитья', 'section' => 'Нитки', 'type' => 'Наборы ниток', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Аксессуары для шитья', 'section' => 'Иглы', 'type' => 'Иглы для Прямострочная швейная машина', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Аксессуары для шитья', 'section' => 'Иглы', 'type' => 'Иглы для Битовая швейная машина', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Аксессуары для шитья', 'section' => 'Иглы', 'type' => 'Иглы для Оверлокы', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Аксессуары для шитья', 'section' => 'Иглы', 'type' => 'Игли для вышивальных машин', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Аксессуары для шитья', 'section' => 'Иглы', 'type' => 'Ручные иглы', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Аксессуары для шитья', 'section' => 'Ножницы', 'type' => 'Портновский ножницы', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Аксессуары для шитья', 'section' => 'Ножницы', 'type' => 'Вышивальные ножницы', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Аксессуары для шитья', 'section' => 'Ножницы', 'type' => 'Ножницы общего назначения', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Аксессуары для шитья', 'section' => 'Ножницы', 'type' => 'Ножницы зигзаг', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Аксессуары для шитья', 'section' => 'Вспомогательные принадлежности', 'type' => 'Булавки', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Аксессуары для шитья', 'section' => 'Вспомогательные принадлежности', 'type' => 'Линейки,Лекала', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Аксессуары для шитья', 'section' => 'Вспомогательные принадлежности', 'type' => 'Сантиметровые ленты,рулетки', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Аксессуары для шитья', 'section' => 'Вспомогательные принадлежности', 'type' => 'Игольницы', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Аксессуары для шитья', 'section' => 'Вспомогательные принадлежности', 'type' => 'Наперстки', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Аксессуары для шитья', 'section' => 'Вспомогательные принадлежности', 'type' => 'Нитевдеватели', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Аксессуары для шитья', 'section' => 'Вспомогательные принадлежности', 'type' => 'Вспарыватели', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Аксессуары для шитья', 'section' => 'Вспомогательные принадлежности', 'type' => 'Калка', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Аксессуары для шитья', 'section' => 'Вспомогательные принадлежности', 'type' => 'Клей', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Аксессуары для шитья', 'section' => 'Вспомогательные принадлежности', 'type' => 'Лупы', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Аксессуары для шитья', 'section' => 'Вспомогательные принадлежности', 'type' => 'Контактная лента (липучка)', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Аксессуары для шитья', 'section' => 'Вспомогательные принадлежности', 'type' => 'Пинцеты', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Аксессуары для шитья', 'section' => 'Вспомогательные принадлежности', 'type' => 'Швейные наборы', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Аксессуары для шитья', 'section' => 'Вспомогательные принадлежности', 'type' => 'Разное', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Швейное оборудование', 'section' => 'Прямострочная швейная машина', 'type' => '', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Швейное оборудование', 'section' => 'Оверлоки', 'type' => '', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Швейное оборудование', 'section' => 'Распошивалки', 'type' => '', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Швейное оборудование', 'section' => 'Битовая швейная машина', 'type' => '', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Швейное оборудование', 'section' => 'Принадлежности для швейных машин и оверлоков', 'type' => '', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Швейное оборудование', 'section' => 'Светильники', 'type' => '', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Вышивальное оборудование', 'section' => 'Вышивальные машины', 'type' => '', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Вышивальное оборудование', 'section' => 'Вышивальные блоки', 'type' => '', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Вышивальное оборудование', 'section' => 'Аксессуары для вышивальных машин', 'type' => '', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Вышивальное оборудование', 'section' => 'По для вышивальных машин', 'type' => '', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Вышивальное оборудование', 'section' => 'Вышивальные дизайны', 'type' => '', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Всё для лоскутного шитья', 'section' => 'Раскройные ножи, лезвия', 'type' => '', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Всё для лоскутного шитья', 'section' => 'Коврики для раскроя', 'type' => '', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Всё для лоскутного шитья', 'section' => 'Линейки, Шаблоны', 'type' => '', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Всё для лоскутного шитья', 'section' => 'Вспомогательные принадлежности для лоскутного шитья', 'type' => '', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Всё для лоскутного шитья', 'section' => 'Трафареты', 'type' => '', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Всё для лоскутного шитья', 'section' => 'По для лоскутного шитья', 'type' => '', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Гладильное оборудование', 'section' => 'Парогенераторы', 'type' => '', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Гладильное оборудование', 'section' => 'Гладильные доски и столы', 'type' => '', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Гладильное оборудование', 'section' => 'Гладильные Прессы', 'type' => '', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Гладильное оборудование', 'section' => 'Отпариватели', 'type' => '', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Гладильное оборудование', 'section' => 'Аксессуары для гладильного оборудования', 'type' => '', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Гладильное оборудование', 'section' => 'Утюги и щетки', 'type' => '', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Портновские манекены', 'section' => 'Манекены раздвижные', 'type' => '', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Портновские манекены', 'section' => 'Манекены мягкие', 'type' => '', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Портновские манекены', 'section' => 'Принадлежности для манекенов', 'type' => '', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Мебель для техники', 'section' => 'Мебель для швейных машин', 'type' => '', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Мебель для техники', 'section' => 'Мебель для вышивальных машин', 'type' => '', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Мебель для техники', 'section' => 'Мебель для вязальных машин', 'type' => '', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
