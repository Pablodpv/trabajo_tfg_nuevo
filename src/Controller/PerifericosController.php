<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PerifericosController extends AbstractController
{
    private function checkLogin(Request $request): bool
    {
        return (bool) $request->getSession()->get('user_logged');
    }

    #[Route('/perifericos', name: 'app_perifericos')]
    public function perifericos(Request $request, ProductRepository $productRepository): Response
    {
        if (!$this->checkLogin($request)) {
            return $this->redirectToRoute('app_login');
        }

        // Obtener todos los periféricos (todas las categorías)
        $productos = $productRepository->findBy([
            'category' => ['raton', 'teclado', 'auricular', 'monitor']
        ]);

        // Agrupar por categoría real
        $categorias = [
            'Ratones' => [],
            'Teclados' => [],
            'Auriculares' => [],
            'Monitores' => [],
        ];

        foreach ($productos as $producto) {
            switch ($producto->getCategory()) {
                case 'raton':
                    $categorias['Ratones'][] = $producto;
                    break;
                case 'teclado':
                    $categorias['Teclados'][] = $producto;
                    break;
                case 'auricular':
                    $categorias['Auriculares'][] = $producto;
                    break;
                case 'monitor':
                    $categorias['Monitores'][] = $producto;
                    break;
            }
        }

        return $this->render('hardwave/perifericos.html.twig', [
            'categorias' => $categorias
        ]);
    }
}