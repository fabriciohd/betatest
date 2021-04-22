<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\Movie;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Movie::factory(5)->create();


        DB::table('movies')->insert([
            'title' => 'Vingadores: Era de Ultron',
            'release_date' => '2015-04-23',
            'director' => 'Joss Whedon',
            'resume' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Adipiscing elit pellentesque habitant morbi. Quis lectus nulla at volutpat. Amet venenatis urna cursus eget nunc scelerisque. Non consectetur a erat nam at lectus urna. Purus semper eget duis at tellus at. Sed odio morbi quis commodo. Vel pharetra vel turpis nunc eget. Pellentesque dignissim enim sit amet venenatis. Natoque penatibus et magnis dis parturient. Mattis pellentesque id nibh tortor. Elit duis tristique sollicitudin nibh sit amet commodo. Leo integer malesuada nunc vel risus commodo viverra maecenas. Mauris pellentesque pulvinar pellentesque habitant morbi tristique. Volutpat est velit egestas dui id ornare arcu odio. Velit aliquet sagittis id consectetur purus ut. Ut porttitor leo a diam sollicitudin tempor id eu. Amet volutpat consequat mauris nunc congue. Et molestie ac feugiat sed lectus vestibulum mattis ullamcorper.',
            'cover_url' => 'https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcRD559ar0kYM2Gp3E9xv1MUgwQ-O6n1Ytj8Vtr__EFsGofsuwWu'
        ]);
        
        DB::table('movies')->insert([
            'title' => 'Vingadores: Guerra Infinita',
            'release_date' => '2018-04-26',
            'director' => 'Joe Russo, Anthony Russo',
            'resume' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Justo eget magna fermentum iaculis. Amet aliquam id diam maecenas ultricies mi eget mauris. Massa vitae tortor condimentum lacinia quis. Dolor sit amet consectetur adipiscing elit. Porttitor leo a diam sollicitudin tempor. Gravida rutrum quisque non tellus orci. Nam libero justo laoreet sit amet. Ultrices mi tempus imperdiet nulla malesuada pellentesque. Aliquet bibendum enim facilisis gravida neque convallis a cras. Dolor morbi non arcu risus quis varius quam. Viverra nam libero justo laoreet. Tortor id aliquet lectus proin. Laoreet suspendisse interdum consectetur libero id. Fringilla ut morbi tincidunt augue. Nullam vehicula ipsum a arcu cursus vitae congue mauris rhoncus. Magnis dis parturient montes nascetur ridiculus. Diam in arcu cursus euismod quis.',
            'cover_url' => 'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcS4neC_Y4U1G6u2QlEFqbCizheGBUnZg1w874qWbIcVlv9tPuSu'
        ]);

        DB::table('movies')->insert([
            'title' => 'Capitão América 2: O Soldado Invernal',
            'release_date' => '2014-04-10',
            'director' => 'Joe Russo, Anthony Russo',
            'resume' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quam viverra orci sagittis eu volutpat. Porttitor rhoncus dolor purus non enim praesent. Sed risus ultricies tristique nulla. Faucibus interdum posuere lorem ipsum dolor. Pellentesque habitant morbi tristique senectus et netus et. Aliquam ultrices sagittis orci a scelerisque purus semper. Sit amet massa vitae tortor. Pulvinar mattis nunc sed blandit libero volutpat. Arcu bibendum at varius vel pharetra. At ultrices mi tempus imperdiet nulla. Morbi tristique senectus et netus et malesuada fames ac turpis.',
            'cover_url' => 'https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcSHB-5yWxF8RJauEqz4LVi9qL9D80J7ZCW98NELAswoBWLATzU-'
        ]);

        DB::table('movies')->insert([
            'title' => 'Homem de Ferro 3',
            'release_date' => '2013-05-26',
            'director' => 'Joe Russo, Anthony Russo',
            'resume' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Pellentesque sit amet porttitor eget dolor. Congue eu consequat ac felis donec et. Enim blandit volutpat maecenas volutpat blandit. Egestas diam in arcu cursus. Vel pharetra vel turpis nunc eget lorem dolor. Accumsan tortor posuere ac ut consequat semper viverra nam. Purus sit amet volutpat consequat. Est velit egestas dui id ornare arcu odio ut. Gravida cum sociis natoque penatibus et magnis dis parturient montes. Elit duis tristique sollicitudin nibh sit amet commodo nulla facilisi. Platea dictumst quisque sagittis purus sit. Consectetur lorem donec massa sapien faucibus et. Donec et odio pellentesque diam. Egestas dui id ornare arcu odio ut sem nulla pharetra. Quam vulputate dignissim suspendisse in. Diam in arcu cursus euismod quis viverra nibh cras. Semper quis lectus nulla at volutpat diam ut.',
            'cover_url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTY8bAIbYn-nJxqXb_Eixa_zCEJIDWdm25oZ8UFnI51mcumTrIQ'
        ]);
    }
}
