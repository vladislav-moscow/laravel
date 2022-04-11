<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        \DB::table('categories')->insert($this->getData());
    }

    private function getData(): array
    {
        $faker = Factory::create('ru_RU');
        $data = [
            [
                'title' => 'Maldives',
                'image' =>$faker->imageUrl(200, 150),
                'description'=>$faker->text(200)
            ],
            [
                'title' => 'Mauritius',
                'image' =>$faker->imageUrl(200, 150),
                'description'=>$faker->text(200)

            ],
            [
                'title' => 'Seychelles',
                'image' =>$faker->imageUrl(200, 150),
                'description'=>$faker->text(200)
            ],
            [
                'title' => 'Cuba',
                'image' =>$faker->imageUrl(200, 150),
                'description'=>$faker->text(200)
            ],
            [
                'title' => 'Bora-Bora',
                'image' =>$faker->imageUrl(200, 150),
                'description'=>$faker->text(200)
            ],
            [
                'title' => 'Philippines',
                'image' =>$faker->imageUrl(200, 150),
                'description'=>$faker->text(200)
            ],
        ];
        return $data;
    }
}
