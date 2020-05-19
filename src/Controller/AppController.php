<?php declare(strict_types = 1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController
{
    /** @Route(name="home") */
    public function index(): Response
    {
        return $this->render('index.html.twig');
    }

    /** @Route("/login", name="login", methods={"GET"}) */
    public function login(): Response
    {
        return $this->render('login.html.twig');
    }

    /** @Route("/login", name="authenticate", methods={"POST"}) */
    public function authenticate(Request $request): Response
    {
        $response = new RedirectResponse($this->generateUrl('home'));

        if ($request->get('email') === 'mladen.bebic@gmail.com') {
            $response->headers->setCookie(new Cookie('logged_in', 'true'));
        }

        return $response;
    }

    /** @Route("/logout", name="logout", methods={"GET"}) */
    public function logout(): Response
    {
        $response = new RedirectResponse($this->generateUrl('login'));
        $response->headers->clearCookie('logged_in');

        return $response;
    }

    /** @Route("/about", name="about") */
    public function about(): Response
    {
        return $this->render('about.html.twig');
    }

    /** @Route("/contact", name="contact") */
    public function contact(): Response
    {
        return $this->render('contact.html.twig');
    }

    /** @Route("/plan", name="plan") */
    public function plan(): Response
    {
        return $this->render('plan.html.twig');
    }
}
