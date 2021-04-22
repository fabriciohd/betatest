<?php

namespace Database\Factories;

use App\Models\Character;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CharacterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Character::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'HEROI N#'.rand(1, 999),
            'real_name' => 'Nome'.rand(1, 100).' Sobrenome'.rand(1, 100),
            'resume' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Feugiat nibh sed pulvinar proin gravida hendrerit. Eu nisl nunc mi ipsum faucibus. Cursus sit amet dictum sit amet justo. Tincidunt id aliquet risus feugiat in ante metus. Arcu bibendum at varius vel pharetra vel turpis nunc. Dictumst vestibulum rhoncus est pellentesque. Malesuada nunc vel risus commodo viverra. Faucibus turpis in eu mi bibendum neque egestas congue quisque. Dignissim sodales ut eu sem integer. Tortor at auctor urna nunc id cursus. In cursus turpis massa tincidunt dui ut ornare.',
            'id_comics' => rand(0, 5),
            'id_movies' => rand(0, 5),
            'id_series' => rand(0, 5),
        ];
    }
}
