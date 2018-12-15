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
        $arnaud->setMail("arnaud@lesson.com");
        $arnaud->setMdp("admin");
        $arnaud->setNom("Linder");
        $arnaud->setNomUtilisateur("admin");
        $arnaud->setPrenom("Arnaud");
        $arnaud->setPhoto("https://upload.wikimedia.org/wikipedia/commons/thumb/a/ab/Logo_TV_2015.png/280px-Logo_TV_2015.png");
        $manager->persist($arnaud);

        $manager->flush();



    }


}