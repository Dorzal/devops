<?php
/**
 * Created by PhpStorm.
 * User: Drano
 * Date: 15/12/2018
 * Time: 15:06
 */

namespace App\Controller;

use App\Entity\Utilisateur;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

class UtilisateurController extends AbstractController
{

    public function new(Request $request)
    {
        $utilisateur = new Utilisateur();
        $utilisateur->setNomUtilisateur("pseudo");
        $utilisateur->setMail("utilisateur@email.com");
        $utilisateur->setNom("nom");
        $utilisateur->setPrenom("prenom");
        $utilisateur->setAge(50);
        $utilisateur->setPhoto("lien photo");
        $utilisateur->setMdp("mdp");

        $form = $this->createFormBuilder($utilisateur)
            ->add('nom_utilisateur', TextType::class)
            ->add('mail', EmailType::class)
            ->add('nom', TextType::class)
            ->add('prenom',  TextType::class)
            ->add('age', IntegerType::class)
            ->add('photo', TextType::class)
            ->add('mdp', PasswordType::class)
            ->add('inscription', SubmitType::class, array('label' => 'Create User'))
            ->getForm();

        return $this->render('Utilisateur/inscription.html.twig', array('form' => $form->createView(),));
    }

}