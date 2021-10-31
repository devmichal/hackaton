<?php

namespace App\Event\Handler;

use App\Exception\IncorrectExtension;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class ExceptionHandler implements EventSubscriberInterface
{
    final public static function getSubscribedEvents(): array
    {
        return[
            KernelEvents::EXCEPTION => [
                ['processException', -10]
            ]
        ];
    }

    public function processException(ExceptionEvent $event)
    {
        $exception = $event->getThrowable();
        do {
            if ($exception instanceof IncorrectExtension) {
                $this->setResponseException($event);
                return;
            }
        } while (null !== $exception = $exception->getPrevious());
    }

    public function setResponseException(ExceptionEvent $event)
    {
        $exception = $event->getThrowable();

        $response = new JsonResponse($exception->getMessage(), Response::HTTP_BAD_REQUEST);
        $event->setResponse($response);
    }
}
