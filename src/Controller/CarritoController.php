<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CarritoController extends AbstractController
{
    /**
     * Muestra la página del carrito
     */
    #[Route('/carrito', name: 'app_carrito')]
    public function index(Request $request): Response
    {
        $session = $request->getSession();
        $carrito = $session->get('carrito', []);

        return $this->render('hardwave/carrito.html.twig', [
            'carrito' => $carrito
        ]);
    }

    /**
     * Añade un producto al carrito usando la sesión
     */
    #[Route('/carrito/add/{nombre}/{precio}', name: 'app_carrito_add')]
    public function add(string $nombre, float $precio, Request $request): Response
    {
        $session = $request->getSession();
        $carrito = $session->get('carrito', []);

        $carrito[] = [
            'nombre' => $nombre,
            'precio' => $precio,
            'fecha' => new \DateTime()
        ];

        $session->set('carrito', $carrito);
        $this->addFlash('success', '¡Producto añadido correctamente!');

        return $this->redirectToRoute('app_hardware');
    }

    /**
     * Vacía todo el carrito
     */
    #[Route('/carrito/vaciar', name: 'app_carrito_vaciar')]
    public function vaciar(Request $request): Response
    {
        $request->getSession()->set('carrito', []);
        return $this->redirectToRoute('app_carrito');
    }
}