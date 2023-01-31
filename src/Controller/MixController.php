<?php

namespace App\Controller;

use App\Entity\VinylMix;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
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
        $genre = ['rock', 'pop'];
        $mix->setGenre($genre[array_rand($genre)]);
        $mix->setVotes(random_int(-50, 50));

        $entityManager->persist($mix);
        $entityManager->flush();

        return new Response(sprintf(
            'Saved new mix with id %d',
            $mix->getId()
        ));
    }

    #[Route('/mix/{slug}', name: 'app_mix_show')]
    public function show(VinylMix $mix): Response
    {
        return $this->render('mix/show.html.twig', [
            'mix' => $mix,
        ]);
    }

    #[Route('/mix/{id}/vote', name: 'app_mix_vote', methods: ['POST'])]
    public function vote(VinylMix $mix, Request $request, EntityManagerInterface $entityManager): Response
    {
        $direction = $request->request->get('direction');

        if ($direction === 'up') {
            $mix->upVote();
        } elseif ($direction === 'down') {
            $mix->downVote();
        }

        $entityManager->flush();

        $this->addFlash('success', 'Vote counted!');

        return $this->redirectToRoute('app_mix_show', [
            'slug' => $mix->getSlug(),
        ]);
    }
}