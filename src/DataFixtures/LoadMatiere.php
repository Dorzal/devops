<?php
/**
 * Created by PhpStorm.
 * User: Drano
 * Date: 15/12/2018
 * Time: 23:54
 */

namespace App\DataFixtures;


use App\Entity\Matiere;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class LoadMatiere extends Fixture
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $matiere = new Matiere();
        $matiere->setNomMatiere("Mathématique");
        $manager->persist($matiere);

        $manager->flush();

        $matier = new Matiere();
        $matier->setNomMatiere("Anglais");
        $manager->persist($matier);

        $manager->flush();

        $matie = new Matiere();
        $matie->setNomMatiere("Français");
        $manager->persist($matie);

        $manager->flush();
    }
}