<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProducersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $table = DB::table('producers');

        $table->insert([
            'id' => 1,
            'name' => 'Jerry Bruckheimer',
            'bio' => 'Jerry Bruckheimer is a film and television producer born on September 21, 1943 in Detroit. He graduated from high school in 1961 before it was moving to Arizona. He started his career in 1968 to produce television commercials and advertising for the firm BBD&O in New York.',
            'birth' => '1943-09-21'
        ]);

        $table->insert([
            'id' => 2,
            'name' => 'Steven Spielberg',
            'bio' => "One of the most influential personalities in the history of cinema, Steven Spielberg is Hollywood's best known director and one of the wealthiest filmmakers in the world. He has an extraordinary number of commercially successful and critically acclaimed credits to his name, either as a director, ...",
            'birth' => '1946-12-18'
        ]);

        $table->insert([
            'id' => 3,
            'name' => 'Harvey Weinstein',
            'bio' => "Harvey Weinstein was born on March 19, 1952, in Flushing, Queens, New York City, New York, USA, the first of two boys born to Max and Miriam Weinstein. He is a film producer, known for Pulp Fiction (1994), Shakespeare in Love (1998), and Gangs of New York (2002). He has been married and divorced ...",
            'birth' => '1952-03-19'
        ]);

        $table->insert([
            'id' => 4,
            'name' => 'Graham King',
            'bio' => "Oscar-winning producer Graham King has worked behind the scenes with the industry's foremost creative talents in both major motion pictures and independent features. Over the last thirty years, King has produced or executive produced more than forty-five films, grossing 1.2 billion dollars at the ...",
            'birth' => '1961-12-19'
        ]);

        $table->insert([
            'id' => 5,
            'name' => 'Joel Silver',
            'bio' => "As flamboyant as any character in his movies, Joel Silver can be credited along with Jerry Bruckheimer as practically reinventing the action film genre in the 1980s. Born in New Jersey, he attended the New York University Film School. After college, he worked at Lawrence Gordon Pictures, earning ...",
            'birth' => '1952-07-14'
        ]);
        $table->insert([
            'id' => 6,
            'name' => 'Dino De Laurentiis',
            'bio' => 'Dino De Laurentiis left home at age 17 to enrol in film school, supporting himself as an actor, extra, propman, or any other job he could get in the film industry. His persistence paid off, and by the time he reached his 20th birthday he already had one produced film under his belt. After serving ...',
            'birth' => '1919-08-08'
        ]);

    }
}
