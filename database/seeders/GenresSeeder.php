<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $table = DB::table('genres');
        $table->insert([
            'id' => 1,
            'name' => 'Action',
            'description' => 'Action description'
        ]);
        $table->insert([
            'id' => 2,
            'name' => 'Adventure',
            'description' => 'Adventure description'
        ]);
        $table->insert([
            'id' => 3,
           'name'=> 'Animation',
            'description' => 'Animation description'
        ]);
        $table->insert([
            'id' => 4,
            'name' => 'Comedy',
            'description' => 'Comedy description'
        ]);
        $table->insert([
            'id' => 5,
            'name' => 'Crime',
            'description' => 'Crime description'
        ]);
        $table->insert([
            'id' => 6,
            'name' => 'Drama',
            'description' => 'Drama description'
        ]);
        $table->insert([
            'id' => 7,
            'name' => 'Fantasy',
            'description' => 'Fantasy description'
        ]);
        $table->insert([
            'id' => 8,
            'name' => 'Horror',
            'description' => 'Horror description'
        ]);
        $table->insert([
            'id' => 9,
            'name' => 'Mystery',
            'description' => 'Mystery description'
        ]);
        $table->insert([
            'id' => 10,
            'name' => 'Sci-Fi',
            'description' => 'Sci-Fi description'
        ]);
    }
}
