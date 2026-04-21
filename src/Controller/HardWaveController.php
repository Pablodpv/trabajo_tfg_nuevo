<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HardWaveController extends AbstractController
{
    /**
     * Verifica si hay una sesión activa
     */
    private function checkLogin(Request $request): bool
    {
        if (!$request->getSession()->get('user_logged')) {
            return false;
        }
        return true;
    }

    /**
     * PORTADA DE LA TIENDA (localhost:8000/home)
     */
    #[Route('/home', name: 'app_home')]
    public function index(Request $request): Response
    {
        // Si no está logueado, lo mandamos a la raíz (/) que es el login
        if (!$this->checkLogin($request)) {
            return $this->redirectToRoute('app_login');
        }

        return $this->render('hardwave/index.html.twig', [
            'products' => [
                [
                    'name' => 'RTX 4080',
                    'price' => 1200,
                    'img' => 'https://via.placeholder.com/200',
                    'desc' => 'Tarjeta gráfica de alto rendimiento para gaming 4K.'
                ],
                [
                    'name' => 'PC Gaming',
                    'price' => 2500,
                    'img' => 'https://via.placeholder.com/200',
                    'desc' => 'PC preconfigurado con refrigeración líquida y luces RGB.'
                ]
            ]
        ]);
    }

    /**
     * SECCIÓN DE HARDWARE (localhost:8000/hardware)
     */
    #[Route('/hardware', name: 'app_hardware')]
    public function hardware(Request $request): Response
    {
        if (!$this->checkLogin($request)) {
            return $this->redirectToRoute('app_login');
        }

        return $this->render('hardwave/hardware.html.twig', [
            'products' => [
                [
                    'name' => 'Placa Base ASUS Prime',
                    'price' => 150,
                    'img' => 'https://via.placeholder.com/200',
                    'desc' => 'Socket AM4 perfecta para procesadores Ryzen.'
                ],
                [
                    'name' => 'Memoria RAM 16GB DDR4',
                    'price' => 75,
                    'img' => 'https://via.placeholder.com/200',
                    'desc' => 'Módulo de alta velocidad con disipador de aluminio.'
                ]
            ]
        ]);
    }
}