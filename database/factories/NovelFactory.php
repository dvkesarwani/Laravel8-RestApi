<?php 

namespace Database\Factories;

use App\Models\Novel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class NovelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Novel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'  => $this->faker->sentence,
            'price' => $this->faker->randomNumber(2),
            'author' => $this->faker->name,
            'editor'=> $this->faker->company,
        ];
    }
}