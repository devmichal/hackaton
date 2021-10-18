<?php

namespace App\Controller\Users;


use App\Enum\HttpCode;
use App\Enum\HttpMessage;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;


class UsersController extends AbstractController
{

    #[Route("/", methods: ["GET"])]
    final public function indexAction(): JsonResponse
    {
        return $this->json(HttpMessage::FIRST_MESSAGE, HttpCode::OK);
    }

    #[Route("/api/account", methods: ["GET"])]
    final public function account(): JsonResponse
    {
        return $this->json('dupa');
    }
}