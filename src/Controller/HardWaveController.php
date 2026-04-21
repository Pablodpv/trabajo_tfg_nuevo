<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HardWaveController extends AbstractController
{
    private function checkLogin(Request $request): bool
    {
        return (bool) $request->getSession()->get('user_logged');
    }

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
                    'img' => 'https://images.unsplash.com/photo-1518770660439-4636190af475?w=500',
                    'desc' => 'Socket AM4 perfecta para procesadores Ryzen.'
                ],
                [
                    'name' => 'Memoria RAM 16GB DDR4',
                    'price' => 75,
                    'img' => 'https://images.unsplash.com/photo-1562976540-1502c2145186?w=500',
                    'desc' => 'Módulo de alta velocidad con disipador de aluminio.'
                ],
                [
                    'name' => 'Procesador Intel i9-13900K',
                    'price' => 580,
                    'img' => 'https://images.unsplash.com/photo-1591799264318-7e6ef8ddb7ea?w=500',
                    'desc' => '24 núcleos y 32 hilos para el máximo rendimiento.'
                ],
                [
                    'name' => 'SSD Samsung 980 Pro 1TB',
                    'price' => 110,
                    'img' => 'https://images.unsplash.com/photo-1544652478-6653e09f18a2?w=500',
                    'desc' => 'Velocidad NVMe M.2 de cuarta generación.'
                ],
                [
                    'name' => 'Ratón Logitech G Pro X',
                    'price' => 125,
                    'img' => 'https://images.unsplash.com/photo-1527443224154-c4a3942d3acf?w=500',
                    'desc' => 'El ratón inalámbrico preferido por los profesionales.'
                ],
                [
                    'name' => 'Teclado Mecánico Corsair K70',
                    'price' => 160,
                    'img' => 'https://images.unsplash.com/photo-1511467687858-23d96c32e4ae?w=500',
                    'desc' => 'Switches Cherry MX Red y retroiluminación RGB.'
                ],
                [
                    'name' => 'Monitor MSI Optix 27"',
                    'price' => 320,
                    'img' => 'https://images.unsplash.com/photo-1527443224154-c4a3942d3acf?w=500',
                    'desc' => 'Panel curvo de 165Hz para gaming fluido.'
                ],
                [
                    'name' => 'Fuente EVGA 750W Gold',
                    'price' => 95,
                    'img' => 'https://images.unsplash.com/photo-1587202377496-03f0e0112441?w=500',
                    'desc' => 'Eficiencia 80 Plus Gold totalmente modular.'
                ]
            ]
        ]);
    }
}