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

class CoursController extends AbstractController
{
    public function index(EntityManagerInterface $em)
    {
        $cours = $em->getRepository(Cours::class)->findAll();

        return $this->render('Cours/index.html.twig', [
            'cours' => $cours,
        ]);
    }

}