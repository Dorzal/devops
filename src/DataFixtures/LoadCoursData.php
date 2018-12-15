<?php
/**
 * Created by PhpStorm.
 * User: Drano
 * Date: 15/12/2018
 * Time: 13:09
 */

namespace App\DataFixtures;


use App\Entity\Cours;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;


class LoadCoursData extends Fixture
{

    public function load(ObjectManager $manager)
    {
        $math = new Cours();

        $math->setNomCours("Math");
        $math->setCertifie(true);
        $math->setContenuCours("Plein de math youpi !! ");
        $math->setDateCours(new \DateTime('06/04/2014'));
        $math->setImageCours("https://upload.wikimedia.org/wikipedia/commons/a/ab/Logo_TV_2015.png");

        $manager->persist($math);

        $manager->flush($math);

        $anglais = new Cours();

        $anglais->setNomCours("Anglais");
        $anglais->setCertifie(true);
        $anglais->setContenuCours("Plein d'Anglais youpi !! ");
        $anglais->setDateCours(new \DateTime('06/04/2014'));
        $anglais->setImageCours("https://www.seoclerk.com/pics/551103-1TOqFD1502285018.jpg");

        $manager->persist($anglais);

        $manager->flush($anglais);


        $comm = new Cours();

        $comm->setNomCours("Communication");
        $comm->setCertifie(true);
        $comm->setContenuCours("Plein d'commentaire youpi !! ");
        $comm->setDateCours(new \DateTime('06/04/2014'));
        $comm->setImageCours("http://www.ballecourbe.ca/wp-content/uploads/2016/12/Capitals-de-Washington-logo.png");

        $manager->persist($comm);

        $manager->flush($comm);

    }

}