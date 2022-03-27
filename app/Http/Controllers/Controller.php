<?php

namespace App\Http\Controllers;

use Faker\Factory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use JetBrains\PhpStorm\ArrayShape;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getCategory():array
    {
        $faker = Factory::create('ru_RU');
        return [
            [
                'id' => 1,
                'title' => 'Maldives',
                'image' =>$faker->imageUrl(200, 150)
            ],
            [
                'id' => 2,
                'title' => 'Mauritius',
                'image' =>$faker->imageUrl(200, 150)
            ],
            [
                'id' => 3,
                'title' => 'Seychelles',
                'image' =>$faker->imageUrl(200, 150)
            ],
            [
                'id' => 4,
                'title' => 'Cuba',
                'image' =>$faker->imageUrl(200, 150)
            ],
            [
                'id' => 5,
                'title' => 'Bora-Bora',
                'image' =>$faker->imageUrl(200, 150)
            ],
            [
                'id' => 6,
                'title' => 'Philippines',
                'image' =>$faker->imageUrl(200, 150)
            ],
        ];
    }


    public function getNews(?int $id = null): array
    {
        $faker = Factory::create();
        $status = ["DRAFT", "ACTIVE", "BLOCKED"];

        if($id) {
            return  [
                'id' =>$id,
                'title'=> $faker->jobTitle(),
                'author' =>$faker->userName(),
                'image' =>$faker->imageUrl(200, 150),
                'description' =>$faker->text(100),
                'status' => $status[mt_rand(0,2)],
            ];
        }

        $data = [];

        foreach ($this->getCategory() as $value) {
            for ($i = 0; $i < 21; $i++) {
                $id = $i +1;
                $data[] = [
                    'id' => $id,
                    'category_id' => $value['id'],
                    'title' => $faker->jobTitle(),
                    'description' => $faker->text(100),
                    'image' =>$faker->imageUrl(200, 150),
                    'author' => $faker->userName(),
                    'status' => $status[mt_rand(0,2)],
                    'created_at' => now()
                ];
            }
        }



        return $data;
    }
}
