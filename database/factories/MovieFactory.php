<?php

namespace Database\Factories;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;

class MovieFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Movie::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $timerStamps = mt_rand(1262055681, 1619113258);
        return [
            'title' => 'Filme N#'.rand(1, 999),
            'release_date' => date("Y-m-d", $timerStamps),
            'director' => 'Diretor'.rand(0, 999).' Sobrenome'.rand(0, 999),
            'resume' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Feugiat nibh sed pulvinar proin gravida hendrerit. Eu nisl nunc mi ipsum faucibus. Cursus sit amet dictum sit amet justo. Tincidunt id aliquet risus feugiat in ante metus. Arcu bibendum at varius vel pharetra vel turpis nunc. Dictumst vestibulum rhoncus est pellentesque. Malesuada nunc vel risus commodo viverra. Faucibus turpis in eu mi bibendum neque egestas congue quisque. Dignissim sodales ut eu sem integer. Tortor at auctor urna nunc id cursus. In cursus turpis massa tincidunt dui ut ornare.',
        ];
    }
}
