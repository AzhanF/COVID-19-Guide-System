<?php

namespace Database\Factories;

use App\Models\Information;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class InformationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Information::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => 'Amalan Kesihatan & Keselamatan Diri Semasa Banjir',
            'description' => '<p>Antara amalan kesihatan dan keselamatan semasa banjir yang perlu diamalkan</p><ol>
                              <li>Minum air yang telah dimasak atau minuman air berbotol.</li>
                              <li>Makan makanan yang telah dimasak dan elak makan makanan yang mentah.</li>
                              <li>Jika makan buah, kupas kulitnya terlebih dahulu.</li>
                              <li>Jaga kebersihan dan keselamatan makanan.</li>
                              </ol>',
            'photo'         => null,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */

}
