<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\Serie;

class SerieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Serie::factory(5)->create();

        DB::table('series')->insert([
            'title' => 'WandaVision',
            'release_date' => '2021-03-05',
            'director' => 'Matt Shakman',
            'resume' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ullamcorper dignissim cras tincidunt lobortis feugiat vivamus at augue. Diam volutpat commodo sed egestas egestas fringilla. Dolor sit amet consectetur adipiscing. Tortor posuere ac ut consequat semper. Interdum velit laoreet id donec ultrices. Aliquam id diam maecenas ultricies mi eget. Fusce ut placerat orci nulla pellentesque dignissim enim sit amet. Enim ut tellus elementum sagittis vitae. Est lorem ipsum dolor sit amet consectetur. Nisl vel pretium lectus quam id leo. Lobortis feugiat vivamus at augue eget arcu dictum varius duis. Adipiscing bibendum est ultricies integer quis auctor elit. Sit amet massa vitae tortor. Dignissim suspendisse in est ante in nibh. Luctus venenatis lectus magna fringilla urna porttitor rhoncus dolor purus. Et leo duis ut diam quam nulla porttitor massa.',
        ]);

        DB::table('series')->insert([
            'title' => 'Falcão e o Soldado Invernal',
            'release_date' => '2021-03-19',
            'director' => 'Kari Skogland',
            'resume' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Eget nunc lobortis mattis aliquam faucibus purus in massa. Rutrum quisque non tellus orci ac auctor. Arcu dictum varius duis at. Ultrices eros in cursus turpis massa tincidunt dui ut. Magna ac placerat vestibulum lectus mauris. Tempor id eu nisl nunc mi ipsum faucibus. Sem fringilla ut morbi tincidunt. Nisl vel pretium lectus quam. Ipsum consequat nisl vel pretium lectus.',
            'cover_url' => 'https://upload.wikimedia.org/wikipedia/pt/9/9a/The_Falcon_and_the_Winter_Soldier_logo.png'
        ]);
    }
}
