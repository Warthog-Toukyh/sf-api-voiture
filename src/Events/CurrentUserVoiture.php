<?php

namespace App\Events;

use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\Voiture;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Security\Core\Security;

class CurrentUserVoiture implements EventSubscriberInterface
{
    private Security $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::VIEW => ['currentUserForCar', EventPriorities::PRE_VALIDATE]
        ];
    }
    public function currentUserForCar(ViewEvent $event): Void
    {
        $voiture = $event->getControllerResult();
        $method = $event->getRequest()->getMethod();

        if ($voiture instanceof Voiture && Request::METHOD_POST === $method) {
            $voiture->setAuthor($this->security->getUser());
        }
    }
}
