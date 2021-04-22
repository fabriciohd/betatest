<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\Character;


class characterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Character::factory(5)->create();

        DB::table('characters')->insert([
            'name' => 'Homem de Ferro',
            'real_name' => 'Tony Stark',
            'resume' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Dolor sit amet consectetur adipiscing. In fermentum et sollicitudin ac. Lorem ipsum dolor sit amet. Facilisis mauris sit amet massa vitae tortor condimentum lacinia. Tempor orci dapibus ultrices in iaculis nunc sed augue lacus. Ornare lectus sit amet est placerat in egestas. Posuere sollicitudin aliquam ultrices sagittis orci a. Consectetur libero id faucibus nisl tincidunt eget nullam non nisi. Viverra vitae congue eu consequat ac felis donec. Blandit turpis cursus in hac.",
            'cover_url' => 'https://upload.wikimedia.org/wikipedia/pt/b/be/Invincible_Iron_Man_Vol_2_2.jpg',
            'id_comics' => '1,4,5',
            'id_movies' => '1,2,4',
        ]);
        
        DB::table('characters')->insert([
            'name' => 'Viúva Negra',
            'real_name' => 'Natasha Romanoff',
            'resume' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Viverra ipsum nunc aliquet bibendum enim facilisis gravida neque. Vel turpis nunc eget lorem dolor sed viverra. Morbi leo urna molestie at. Consectetur adipiscing elit pellentesque habitant morbi tristique. Odio pellentesque diam volutpat commodo sed egestas egestas fringilla phasellus. Pellentesque dignissim enim sit amet venenatis urna. In arcu cursus euismod quis viverra nibh cras pulvinar mattis. Sollicitudin tempor id eu nisl nunc mi ipsum. Felis eget nunc lobortis mattis. Est ultricies integer quis auctor elit sed vulputate. Phasellus egestas tellus rutrum tellus pellentesque eu. Eget sit amet tellus cras adipiscing enim eu turpis egestas. Arcu cursus vitae congue mauris.",
            'cover_url' => 'https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcQo1Os17YZIWCSQWO117qLvg7B4Vm1SPA22bYN5kXjSWzZPrExP',
            'id_comics' => '1,4',
            'id_movies' => '1,2,3',
        ]);

        DB::table('characters')->insert([
            'name' => 'Capitão América',
            'real_name' => 'Steve Rogers',
            'resume' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elit at imperdiet dui accumsan sit amet nulla facilisi morbi. Augue interdum velit euismod in pellentesque. Erat imperdiet sed euismod nisi porta lorem mollis aliquam. Libero id faucibus nisl tincidunt eget nullam. Est ultricies integer quis auctor elit sed. Ut etiam sit amet nisl purus in mollis. Gravida neque convallis a cras semper auctor neque. Pellentesque habitant morbi tristique senectus et. Massa tincidunt nunc pulvinar sapien et. Odio ut enim blandit volutpat maecenas volutpat blandit aliquam. Posuere lorem ipsum dolor sit amet. Arcu non sodales neque sodales ut etiam sit amet. Mi tempus imperdiet nulla malesuada pellentesque elit eget. Nunc sed augue lacus viverra vitae congue. Sit amet purus gravida quis.",
            'id_comics' => '1,4,2',
            'id_movies' => '1,2,3',
        ]);

        DB::table('characters')->insert([
            'name' => 'Gavião Arqueiro',
            'real_name' => 'Clint Barton',
            'resume' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lacus vel facilisis volutpat est velit egestas dui id. Risus in hendrerit gravida rutrum quisque non tellus orci ac. Sed enim ut sem viverra aliquet eget sit amet tellus. Sagittis eu volutpat odio facilisis. Proin nibh nisl condimentum id venenatis a. Amet risus nullam eget felis. Lectus proin nibh nisl condimentum. Enim diam vulputate ut pharetra sit. Neque sodales ut etiam sit amet nisl. Arcu non odio euismod lacinia at. Maecenas pharetra convallis posuere morbi leo urna molestie at. Ut faucibus pulvinar elementum integer enim neque volutpat ac tincidunt. Aliquam etiam erat velit scelerisque in dictum. Porttitor rhoncus dolor purus non enim.",
            'id_comics' => '1,4',
            'id_movies' => '1,2',
        ]);

        DB::table('characters')->insert([
            'name' => 'Feiticeira Escarlate',
            'real_name' => 'Wanda Maximoff',
            'resume' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lacus vel facilisis volutpat est velit egestas dui id. Risus in hendrerit gravida rutrum quisque non tellus orci ac. Sed enim ut sem viverra aliquet eget sit amet tellus. Sagittis eu volutpat odio facilisis. Proin nibh nisl condimentum id venenatis a. Amet risus nullam eget felis. Lectus proin nibh nisl condimentum. Enim diam vulputate ut pharetra sit. Neque sodales ut etiam sit amet nisl. Arcu non odio euismod lacinia at. Maecenas pharetra convallis posuere morbi leo urna molestie at. Ut faucibus pulvinar elementum integer enim neque volutpat ac tincidunt. Aliquam etiam erat velit scelerisque in dictum. Porttitor rhoncus dolor purus non enim.",
            'cover_url' => 'https://pt.wikipedia.org/wiki/Feiticeira_Escarlate#/media/Ficheiro:Feiticeira_Escarlate.jpg',
            'id_comics' => '1,4',
            'id_movies' => '1,2',
            'id_series' => '1'
        ]);
    }
}
