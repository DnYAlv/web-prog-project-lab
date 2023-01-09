<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // Reference: Wikipedia related to each movies
    public function run()
    {
        DB::table('movies')->insert([
            [
                'title' => 'Doctor Strange in the Multiverse of Madness',
                'description' => 'Doctor Strange teams up with a mysterious teenage girl from his dreams who can travel across multiverses, to battle multiple threats, including other-universe versions of himself, which threaten to wipe out millions across the multiverse.',
                'director' => 'Sam Raimi',
                'release_date' => '2022-05-05',
                'image_thumbnail' => 'dr-strange-2-thumb.jpg',
                'background' => 'dr-strange-2-bg.jpg'
            ],
            [
                'title' => 'Black Adam',
                'description' => 'In ancient Kahndaq, Teth Adam was bestowed the almighty powers of the gods. After using these powers for vengeance, he was imprisoned, becoming Black Adam. Nearly 5,000 years have passed, and Black Adam has gone from man to myth to legend. Now free, his unique form of justice, born out of rage, is challenged by modern-day heroes who form the Justice Society: Hawkman, Dr. Fate, Atom Smasher and Cyclone.',
                'director' => 'Jaume Collet-Serra',
                'release_date' => '2022-10-19',
                'image_thumbnail' => 'black-adam-thumb.jpg',
                'background' => 'black-adam-bg.jpg'
            ],
            [
                'title' => 'The Quintessential Quintuplets Movie',
                'description' => 'Teenage tutor Fuutaro Uesugi struggles to help the beautiful Nakano sisters graduate high school. All the sisters have feelings for him, and during the school\'s cultural festival, Fuutaro makes a choice between them. The wedding is revealed in a flash-forward.',
                'director' => 'Masato Jinbo',
                'release_date' => '2022-09-28',
                'image_thumbnail' => 'gotoubun-thumb.jpg',
                'background' => 'gotoubun-bg.jpg'
            ],
            [
                'title' => 'Spiderman No Way Home',
                'description' => 'Spider-Man seeks the help of Doctor Strange to forget his exposed secret identity as Peter Parker. However, Strange\'s spell goes horribly wrong, leading to unwanted guests entering their universe.',
                'director' => 'Jon Watts',
                'release_date' => '2021-12-15',
                'image_thumbnail' => 'spiderman-nwh-thumb.jpeg',
                'background' => 'spiderman-nwh-bg.jpg'
            ],
            [
                'title' => 'Avatar The Way of Water',
                'description' => 'Jake Sully and Ney\'tiri have formed a family and are doing everything to stay together. However, they must leave their home and explore the regions of Pandora. When an ancient threat resurfaces, Jake must fight a difficult war against the humans.',
                'director' => 'James Cameron',
                'release_date' => '2022-12-14',
                'image_thumbnail' => 'avatar-twow-thumb.jpeg',
                'background' => 'avatar-twow-bg.jpg'
            ],
            [
                'title' => 'Hobbs and Shaw',
                'description' => 'US agent Luke Hobbs and British mercenary Deckard Shaw are forced to put their rivalry side and work together to stop a genetically enhanced supervillain.',
                'director' => 'David Leitch',
                'release_date' => '2019-07-31',
                'image_thumbnail' => 'fast-furious-hobbs-shaw-thumb.jpg',
                'background' => 'fast-furious-hobbs-shaw-bg.jpg'
            ]
        ]);
    }
}
