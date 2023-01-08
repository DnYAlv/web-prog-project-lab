<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('actors')->insert([
            [
                'name' => 'Benedict Cumberbatch',
                'gender' => 'Male',
                'biography' => 'Benedict Timothy Carlton Cumberbatch CBE is an English actor. Known for his work on screen and stage, he has received various accolades, including a British Academy Television Award, a Primetime Emmy Award and a Laurence Olivier Award.',
                'date_of_birth' => '1976-07-19',
                'place_of_birth' => 'United Kingdom (UK)',
                'image_url' => 'benedict-cumberbatch.jpg',
                'popularity' => 85
            ],
            [
                'name' => 'Elizabeth Olsen',
                'gender' => 'Female',
                'biography' => 'Elizabeth Chase Olsen is an American actress. Born in Sherman Oaks, California, Olsen began acting at age four.',
                'date_of_birth' => '1989-02-16',
                'place_of_birth' => 'United States (USA)',
                'image_url' => 'elizabeth-olsen.jpg',
                'popularity' => 80
            ],
            [
                'name' => 'Dwayne Johnson',
                'gender' => 'Male',
                'biography' => 'Dwayne Douglas Johnson, also known by his ring name The Rock, is an American actor and former professional wrestler.',
                'date_of_birth' => '1972-05-02',
                'place_of_birth' => 'United States (USA)',
                'image_url' => 'dwayne-johnson.jpeg',
                'popularity' => 90
            ],
            [
                'name' => 'Yoshitsugu Matsuoka',
                'gender' => 'Male',
                'biography' => 'Yoshitsugu Matsuoka is a Japanese voice actor from Hokkaido affiliated with the talent agency I\'m Enterprise.',
                'date_of_birth' => '1986-09-17',
                'place_of_birth' => 'Japan',
                'image_url' => 'yoshitsugu-matsuoka.jpg',
                'popularity' => 80
            ],
            [
                'name' => 'Tom Holland',
                'gender' => 'Male',
                'biography' => 'Thomas Stanley Holland is an English actor. His accolades include a British Academy Film Award, three Saturn Awards, a Guinness World Record and an appearance on the Forbes 30 Under 30 Europe list. Some publications have called him one of the most popular actors of his generation.',
                'date_of_birth' => '1996-06-01',
                'place_of_birth' => 'United Kingdom (UK)',
                'image_url' => 'tom-holland.jpg',
                'popularity' => 92
            ],
            [
                'name' => 'Sam Worthington',
                'gender' => 'Male',
                'biography' => 'Samuel Henry John Worthington is an Australian actor. He is best known for playing Jake Sully in the Avatar franchise, Marcus Wright in Terminator Salvation, and Perseus in Clash of the Titans and its sequel Wrath of the Titans.',
                'date_of_birth' => '1976-08-02',
                'place_of_birth' => 'United Kingdom (UK)',
                'image_url' => 'sam-worthington.jpg',
                'popularity' => 75
            ],
            [
                'name' => 'Zoe Saldana',
                'gender' => 'Female',
                'biography' => 'Zoë Yadira Saldaña-Perego is an American actress. Known primarily for her work in science fiction film franchises, she has appeared in three of the five highest-grossing films of all time, a feat not achieved by any other performer.',
                'date_of_birth' => '1978-06-19',
                'place_of_birth' => 'United States (USA)',
                'image_url' => 'zoe-saldana.jpg',
                'popularity' => 75
            ],
            [
                'name' => 'Jason Statham',
                'gender' => 'Male',
                'biography' => 'Jason Statham is an English actor. He is known for portraying characters in various action-thriller films who are typically tough, hardboiled, gritty, or violent. Statham began practising Chinese martial arts, kickboxing, and karate recreationally in his youth while working at local market stalls.',
                'date_of_birth' => '1967-07-26',
                'place_of_birth' => 'United Kingdom (UK)',
                'image_url' => 'jason-statham.jpg',
                'popularity' => 95
            ]
        ]);
    }
}
