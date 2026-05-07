<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PCsMontadosController extends AbstractController
{
    private function checkLogin(Request $request): bool
    {
        return (bool) $request->getSession()->get('user_logged');
    }

    #[Route('/pcs-montados', name: 'app_pcs_montados')]
    public function index(Request $request, ProductRepository $productRepository): Response
    {
        if (!$this->checkLogin($request)) {
            return $this->redirectToRoute('app_login');
        }

        // Obtener productos categoría pc
        $pcs = $productRepository->findBy([
            'category' => 'pc'
        ]);

        return $this->render('hardwave/pcsMontados.html.twig', [
            'pcs' => $pcs
        ]);
    }
}