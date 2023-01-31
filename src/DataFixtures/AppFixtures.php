<?php

namespace App\DataFixtures;

use App\Entity\VinylMix;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $mix = new VinylMix();
        $mix->setTitle('Voyager');
        $mix->setDescription('Daft Punk - Voyager song was created in 1997');
        $mix->setTrackCount(random_int(1, 99));
        $genre = ['rock', 'pop'];
        $mix->setGenre($genre[array_rand($genre)]);
        $mix->setVotes(random_int(-50, 50));

        $manager->persist($mix);

        $manager->flush();
    }
}
