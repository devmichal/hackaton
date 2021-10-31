<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;


class AdminController extends AbstractController
{
    #[Route('/admin/{data}', methods: ["GET"])]
    final public function indexAction(
        ? string $data = null
    ): JsonResponse
    {

        return $this->json('ok');
    }
}