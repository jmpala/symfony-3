<?php

namespace App\Controller;

use App\Entity\VinylMix;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MixController extends AbstractController
{

    #[Route('/mix/new')]
    public function new(EntityManagerInterface $entityManager): Response
    {
        $mix = new VinylMix();
        $mix->setTitle('Voyager');
        $mix->setDescription('Daft Punk - Voyager song was created in 1997');
        $mix->setTrackCount(random_int(1, 99));
        $mix->setGenre('Electronic');
        $mix->setVotes(random_int(-50, 50));

        $entityManager->persist($mix);
        $entityManager->flush();

        return new Response(sprintf(
            'Saved new mix with id %d',
            $mix->getId()
        ));
    }
}