<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert($this->getData());
    }

    private function getData(): array
    {
        $faker = Factory::create('ru_RU');
        $data = [];

        for ($i = 0; $i < 21; $i++) {
            $data[] = [
                'category_id' => 1,
                'title' => $faker->jobTitle(),
                'description' => $faker->text(100),
                'image' =>$faker->imageUrl(200, 150),
                'author' => $faker->userName(),
                'status' => 'ACTIVE',
            ];
        }


        return $data;
    }
}
