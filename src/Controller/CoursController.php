<?php
/**
 * Created by PhpStorm.
 * User: Drano
 * Date: 15/12/2018
 * Time: 14:05
 */

namespace App\Controller;

use App\Entity\Cours;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class CoursController extends AbstractController
{
    public function index(EntityManagerInterface $em)
    {
        $cours = $em->getRepository(Cours::class)->findAll();

        return $this->render('Cours/index.html.twig', [
            'cours' => $cours,
        ]);
    }


    public function show(EntityManagerInterface $em, int $id_cours) : Response
    {
        // dans un projet réel, il sera nécessaire de faire une requête permettant de vérifier que tous les éléments
        // correspondent à une offre d'emploi valide
        $cours = $em->getRepository(Cours::class)->find($id_cours);
        if (null === $cours) {
            throw new NotFoundHttpException();
        }

        return $this->render('Cours/show.html.twig', [
            'cours' => $cours,
        ]);
    }

}