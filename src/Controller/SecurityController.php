<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\SignupType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{

    /**
     * @Route("/login")
     */
    public function loginAction(AuthenticationUtils $authenticationUtils)
    {
        $error = $authenticationUtils->getLastAuthenticationError();
        $username = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', [
            'error' => $error,
            'username' => $username,
        ]);
    }

    /**
     * @Route("/inscription")
     */
    public function signupAction(Request $request, UserPasswordEncoderInterface $userPasswordEncoder)
    {
        $user = new User();

        $form = $this->createForm(SignupType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $password = $userPasswordEncoder->encodePassword($user, $user->getRawPassword());
            $user->setPassword($password);
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            $this->addFlash('success', 'Vous avez bien été enregistré.');

            return $this->redirectToRoute('app_default_index');
        }

        return $this->render('security/signup.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/hello")
     */
    public function helloAction()
    {
        $user = $this->getUser();
        $this->addFlash('success', 'Vous vous êtes connecté avec succés. Bienvenue ' . $user->getUsername() . ' !');
        return $this->redirectToRoute('app_default_index');
    }

    /**
     * @Route("/bye")
     */
    public function byeAction()
    {
        $this->addFlash('warning', 'Vous vous êtes déconnecté avec succés. Aurevoir !');
        return $this->redirectToRoute('app_default_index');
    }

    /**
     * @Route("/redirect")
     */
    public function redirectAction()
    {
        $this->addFlash('warning', 'Vous devez être connecté pour accéder à ce contenu !');
        return $this->redirectToRoute('app_security_login');
    }

}