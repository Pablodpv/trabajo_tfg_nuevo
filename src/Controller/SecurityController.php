<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class SecurityController extends AbstractController
{
    #[Route('/', name: 'app_login')]
    public function login(
        Request $request,
        EntityManagerInterface $entityManager,
        UserPasswordHasherInterface $passwordHasher
    ): Response {
        $session = $request->getSession();

        // Si ya está logueado y entra a la raíz, lo mandamos a HARDWARE
        if ($session->get('user_logged')) {
            return $this->redirectToRoute('app_hardware');
        }

        $error = null;
        $flashErrors = $session->getFlashBag()->get('error');
        if (count($flashErrors) > 0) {
            $error = $flashErrors[0];
        }

        if ($request->isMethod('POST')) {
            $email = $request->request->get('email');
            $password = $request->request->get('password');

            $user = $entityManager->getRepository(User::class)->findOneBy(['email' => $email]);

            if ($user && $passwordHasher->isPasswordValid($user, $password)) {
                $session->set('user_logged', true);
                $session->set('user_email', $email);

                // ¡ESTA ES LA LÍNEA CLAVE! Redirigimos a hardware
                return $this->redirectToRoute('app_hardware');
            }

            $this->addFlash('error', 'Correo o contraseña incorrectos');
            return $this->redirectToRoute('app_login');
        }

        return $this->render('security/login.html.twig', [
            'error' => $error
        ]);
    }

    #[Route('/logout', name: 'app_logout')]
    public function logout(Request $request): Response
    {
        $request->getSession()->clear();
        return $this->redirectToRoute('app_login');
    }
}