<?php
/**
 * Created by PhpStorm.
 * User: Drano
 * Date: 15/12/2018
 * Time: 12:40
 */

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class DefaultController
{

    private $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    public function index(Request $request): Response
    {
        return new Response($this->twig->render('home.html.twig', [
            'name' => $request->get('name', 'World')
        ]));
    }

}