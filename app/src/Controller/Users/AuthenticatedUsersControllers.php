<?php

namespace App\Controller\Users;

use App\Enum\HttpMessage;
use App\Factory\Account\CreateAccount\CreateAccountInterface;
use App\Repository\FilterUsersAccount;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

#[Route("/api")]
class AuthenticatedUsersControllers extends AbstractController
{
    #[Route("/account/{data}", methods: ["GET"])]
    final public function indexAction(
        FilterUsersAccount $account,
        SerializerInterface $serializer,
        ?string $data = null
    ): JsonResponse {

        $dataAccount = $account->filterAccount($data);

        $serializerDataAccount = $serializer->serialize($dataAccount, 'json');

        return JsonResponse::fromJsonString($serializerDataAccount);
    }


    #[Route("/account/pay-in", methods: ["POST"])]
    final public function payIn(
        Request $request,
        CreateAccountInterface $createAccount
    ): JsonResponse
    {
        $content = json_decode($request->getContent(), true);

        $createAccount->payIn($content, $this->getUser());

        return new JsonResponse(HttpMessage::AUTH_MESSAGE, Response::HTTP_OK);
    }
}
