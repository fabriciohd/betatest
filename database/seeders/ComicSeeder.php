<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class comicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comics')->insert([
            'title' => 'Os vingadores #1',            
            'published_date' => '1963-09-25',            
            'writer' => 'Stan Lee',            
            'penciler' => 'Jack Kirby',            
            'resume' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Euismod in pellentesque massa placerat duis. Ipsum dolor sit amet consectetur adipiscing elit ut aliquam purus. Dolor sit amet consectetur adipiscing elit duis tristique. Sit amet nulla facilisi morbi tempus iaculis. Cras tincidunt lobortis feugiat vivamus at augue eget arcu dictum. Volutpat ac tincidunt vitae semper quis lectus. Donec adipiscing tristique risus nec feugiat in. Dui faucibus in ornare quam viverra orci. Lacus laoreet non curabitur gravida arcu ac. Turpis tincidunt id aliquet risus feugiat. Lacinia at quis risus sed vulputate odio. Pellentesque id nibh tortor id. Id porta nibh venenatis cras. Eros in cursus turpis massa tincidunt dui. Pellentesque adipiscing commodo elit at imperdiet dui accumsan. Amet dictum sit amet justo donec enim diam vulputate. Phasellus vestibulum lorem sed risus ultricies. Nibh nisl condimentum id venenatis a condimentum vitae.',            
            'cover_url' => 'https://pt.wikipedia.org/wiki/Vingadores#/media/Ficheiro:Vingadores.jpg',
        ]);

        DB::table('comics')->insert([
            'title' => 'Os vingadores #2',            
            'published_date' => '1970-02-12',            
            'writer' => 'Stan Lee',            
            'penciler' => 'Jack Kirby',            
            'resume' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Euismod in pellentesque massa placerat duis. Ipsum dolor sit amet consectetur adipiscing elit ut aliquam purus. Dolor sit amet consectetur adipiscing elit duis tristique. Sit amet nulla facilisi morbi tempus iaculis. Cras tincidunt lobortis feugiat vivamus at augue eget arcu dictum. Volutpat ac tincidunt vitae semper quis lectus. Donec adipiscing tristique risus nec feugiat in. Dui faucibus in ornare quam viverra orci. Lacus laoreet non curabitur gravida arcu ac. Turpis tincidunt id aliquet risus feugiat. Lacinia at quis risus sed vulputate odio. Pellentesque id nibh tortor id. Id porta nibh venenatis cras. Eros in cursus turpis massa tincidunt dui. Pellentesque adipiscing commodo elit at imperdiet dui accumsan. Amet dictum sit amet justo donec enim diam vulputate. Phasellus vestibulum lorem sed risus ultricies. Nibh nisl condimentum id venenatis a condimentum vitae.',            
            'cover_url' => 'https://mlpnk72yciwc.i.optimole.com/cqhiHLc.WqA8~2eefa/w:auto/h:auto/q:75/https://bleedingcool.com/wp-content/uploads/2020/08/R1-1.jpg',
        ]);

        DB::table('comics')->insert([
            'title' => 'Capitão América - terra-616',            
            'published_date' => '1970-01-12',            
            'writer' => 'Stan Lee',            
            'penciler' => 'Jack Kirby',            
            'resume' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Euismod in pellentesque massa placerat duis. Ipsum dolor sit amet consectetur adipiscing elit ut aliquam purus. Dolor sit amet consectetur adipiscing elit duis tristique. Sit amet nulla facilisi morbi tempus iaculis. Cras tincidunt lobortis feugiat vivamus at augue eget arcu dictum. Volutpat ac tincidunt vitae semper quis lectus. Donec adipiscing tristique risus nec feugiat in. Dui faucibus in ornare quam viverra orci. Lacus laoreet non curabitur gravida arcu ac. Turpis tincidunt id aliquet risus feugiat. Lacinia at quis risus sed vulputate odio. Pellentesque id nibh tortor id. Id porta nibh venenatis cras. Eros in cursus turpis massa tincidunt dui. Pellentesque adipiscing commodo elit at imperdiet dui accumsan. Amet dictum sit amet justo donec enim diam vulputate. Phasellus vestibulum lorem sed risus ultricies. Nibh nisl condimentum id venenatis a condimentum vitae.',            
            'cover_url' => 'https://static.wikia.nocookie.net/marveldatabase/images/d/d8/Winter_Soldier_Vol_2_1_Textless.jpg/revision/latest?cb=20180919043401',
        ]);

        DB::table('comics')->insert([
            'title' => 'Dias de um futuro esquecida',            
            'published_date' => '1980-02-12',            
            'writer' => 'Chris Claremont',            
            'penciler' => 'John Byrne',            
            'resume' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Vitae purus faucibus ornare suspendisse sed nisi lacus. Auctor eu augue ut lectus arcu bibendum at varius. Scelerisque viverra mauris in aliquam sem. Nunc eget lorem dolor sed viverra ipsum nunc aliquet. Nibh cras pulvinar mattis nunc sed blandit libero volutpat. Urna nec tincidunt praesent semper feugiat. Egestas fringilla phasellus faucibus scelerisque. Tortor condimentum lacinia quis vel eros donec. Quam id leo in vitae turpis. Euismod lacinia at quis risus sed. Fermentum et sollicitudin ac orci phasellus egestas tellus rutrum tellus.',            
        ]);

        DB::table('comics')->insert([
            'title' => 'Infinity Gauntlet',            
            'published_date' => '1991-04-25',            
            'writer' => 'Jim Starlin',            
            'penciler' => 'Ron Lim, George Pérez',            
            'resume' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sit amet luctus venenatis lectus magna fringilla urna porttitor. Feugiat pretium nibh ipsum consequat nisl vel pretium. Tellus rutrum tellus pellentesque eu tincidunt tortor aliquam nulla. Nunc aliquet bibendum enim facilisis gravida neque. Ac auctor augue mauris augue neque gravida in fermentum. Mattis nunc sed blandit libero volutpat sed cras. Nunc pulvinar sapien et ligula ullamcorper malesuada proin. Sit amet facilisis magna etiam tempor orci eu. In est ante in nibh mauris cursus mattis molestie a. Id aliquet risus feugiat in ante metus dictum at. Nisi lacus sed viverra tellus in hac habitasse. Ultrices vitae auctor eu augue ut lectus. Erat nam at lectus urna duis convallis convallis tellus id. Vel fringilla est ullamcorper eget. Egestas integer eget aliquet nibh. Lacus suspendisse faucibus interdum posuere lorem. Mi sit amet mauris commodo quis. Pellentesque elit eget gravida cum. Sit amet risus nullam eget.',            
            'cover_url' => 'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcSYKyg_ey3VpPD2ZYMNzi3_Xe6ycSAKMA_x5iBlGVCa7hX26DoM'
        ]);
    }
}
