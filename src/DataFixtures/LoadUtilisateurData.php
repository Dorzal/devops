<?php
/**
 * Created by PhpStorm.
 * User: Drano
 * Date: 15/12/2018
 * Time: 12:49
 */

namespace App\DataFixtures;


use App\Entity\Utilisateur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class LoadUtilisateurData extends Fixture
{

    public function load(ObjectManager $manager)
    {

        $arnaud = new Utilisateur();
        $arnaud->setActive(true);
        $arnaud->setAge(24);
        $arnaud->setBio("je dev de temps en temps");
        $arnaud->setEmail("arnaud@lesson.com");
        $arnaud->setPassword("admin");
        $arnaud->setPlainPassword("admin");
        $arnaud->setNom("Linder");
        $arnaud->setUsername("admin");
        $arnaud->setPrenom("Arnaud");
        $manager->persist($arnaud);

        $manager->flush();
    }


}