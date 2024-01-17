<?php

namespace Database\Seeders;

use App\Models\Movies;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MoviesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $movie_1 = Movies::create([
            'id' => 1,
            'title' => 'Armageddon',
            'synopsis' => 'After discovering that an asteroid the size of Texas will impact Earth in less than a month, NASA recruits a misfit team of deep-core drillers to save the planet.',
            'aired' => '1993-08-08',
            'score' => '6.7',
        ]);

        $movie_1->genres()->attach([1, 2, 10]);
        $movie_1->producers()->attach([1]);

       $movie_2 = Movies::create([
            'id' => 2,
            'title' => "Pirates of the Caribbean: At World's End",
            'synopsis' => 'Captain Barbossa, Will Turner and Elizabeth Swann must sail off the edge of the map, navigate treachery and betrayal, find Jack Sparrow, and make their final alliances for one last decisive battle.',
            'aired' => '2007-08-08',
            'score' => '7.1',
        ]);

       $movie_2->genres()->attach([1, 2, 7]);
       $movie_2->producers()->attach([1]);

        $movie_3 = Movies::create([
            'id' => 3,
            'title' => "Schindler's List",
            'synopsis' => 'In German-occupied Poland during World War II, industrialist Oskar Schindler gradually becomes concerned for his Jewish workforce after witnessing their persecution by the Nazis.',
            'aired' => '1993-08-08',
            'score' => '9.0',
        ]);

        $movie_3->genres()->attach([6]);
        $movie_3->producers()->attach([2]);

        $movie_4 = Movies::create([
            'id' => 4,
            'title' => "The Lord of the Rings: The Fellowship of the Ring",
            'synopsis' => 'A meek Hobbit from the Shire and eight companions set out on a journey to destroy the powerful One Ring and save Middle-earth from the Dark Lord Sauron.',
            'aired' => '2001-08-08',
            'score' => '8.9',
        ]);

        $movie_4->genres()->attach([1, 2, 6]);
        $movie_4->producers()->attach([3]);



    }
}
