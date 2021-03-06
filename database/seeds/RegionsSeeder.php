<?php

use App\Models\Street;
use Illuminate\Database\Seeder;
use App\Models\Region;
use App\Models\Area;
use App\Models\Village;
use Illuminate\Support\Facades\DB;

class RegionsSeeder extends Seeder
{

    private $faker;

    public function __construct()
    {
        $this->faker = \Faker\Factory::create('ru_RU');
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $regions = [
            'Адыгея',
            'Алтай',
            'Алтайский край',
            'Амурская область',
            'Архангельская область',
            'Астраханская область',
            'Башкортостан',
            'Белгородская область',
            'Брянская область',
            'Бурятия',
            'Владимирская область',
            'Волгоградская область',
            'Вологодская область',
            'Воронежская область',
            'Дагестан',
            'Еврейская АО',
            'Забайкальский край',
            'Ивановская область',
            'Ингушетия',
            'Иркутская область',
            'Кабардино-Балкария',
            'Калининградская область',
            'Калмыкия',
            'Калужская область',
            'Камчатский край',
            'Карачаево-Черкессия',
            'Карелия',
            'Кемеровская область',
            'Кировская область',
            'Коми',
            'Костромская область',
            'Краснодарский край',
            'Красноярский край',
            'Курганская область',
            'Курская область',
            'Ленинградская область',
            'Липецкая область',
            'Магаданская область',
            'Марий Эл',
            'Мордовия',
            'Москва',
            'Московская область',
            'Мурманская область',
            'Ненецкий АО',
            'Нижегородская область',
            'Новгородская область',
            'Новосибирская область',
            'Омская область',
            'Оренбургская область',
            'Орловская область',
            'Пензенская область',
            'Пермский край',
            'Приморский край',
            'Псковская область',
            'Ростовская область',
            'Рязанская область',
            'Самарская область',
            'Санкт-Петербург',
            'Саратовская область',
            'Саха (Якутия)',
            'Сахалинская область',
            'Свердловская область',
            'Северная Осетия - Алания',
            'Смоленская область',
            'Ставропольский край',
            'Тамбовская область',
            'Татарстан',
            'Тверская область',
            'Томская область',
            'Тульская область',
            'Тыва',
            'Тюменская область',
            'Удмуртия',
            'Ульяновская область',
            'Хабаровский край',
            'Хакасия',
            'Ханты-Мансийский АО - Югра',
            'Челябинская область',
            'Чеченская республика',
            'Чувашская республика',
            'Чукотский АО',
            'Ямало-Ненецкий АО',
            'Ярославская область',
            'Крым',
            'Севастополь'
        ];

        $streetsCount = Street::count();
        foreach ($regions as $region) {
            $region = Region::create(['name' => $region]);

            $i = 0;
            while ($i++ < 3) {
                try {
                    $area = Area::create([
                        'region_id' => $region->id,
                        'name'      => ucfirst($this->faker->word)
                    ]);

                } catch (Throwable $e) {
                    print 'Error ' . $e->getMessage() . "\n";
                }

                $j = 0;
                while ($j++ < 5) {
                    try {
                        $village = Village::create([
                            'area_id' => $area->id,
                            'name'    => 'деревня ' . ucfirst($this->faker->word) . '-' . $this->faker->word
                        ]);
                    } catch (Throwable $e) {
                        print 'Error ' . $e->getMessage() . "\n";
                    }
                    $k = 0;
                    while ($k++ < 5) {
                        try {
                            DB::table('street_village')->insert([
                                'street_id'  => random_int(1, $streetsCount),
                                'village_id' => $village->id
                            ]);
                        } catch (Throwable $e) {
                            print 'Error ' . $e->getMessage() . "\n";
                        }
                    }
                }
            }
        }
    }
}
