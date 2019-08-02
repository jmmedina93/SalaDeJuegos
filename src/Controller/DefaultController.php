<?php

namespace App\Controller;

use App\Form\NewUserType;
use App\Form\LoginFormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function Home(Request $request)
    {

        return $this->render('index.html.twig');
    }

    /**
     * @Route("/login", name="login")
     */
    public function Login(Request $request)
    {

        $loginForm = $this->createForm(LoginFormType::class);

        return $this->render('login/index.html.twig', array(
            'formLogin' => $loginForm->createView(),
        ));
    }
}
