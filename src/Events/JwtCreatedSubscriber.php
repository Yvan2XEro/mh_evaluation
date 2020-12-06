<?php

namespace App\Events;

use App\Entity\MHUser;
use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTCreatedEvent;

class JwtCreatedSubscriber
{
    public function updateJwtData(JWTCreatedEvent $event)
    {
        /**
         * @var MHUser
         */

        $user   = $event->getUser();
        $data   = $event->getData();
        $data['firstName']  = $user->getFirstName();
        $data['name']       = $user->getName();
        $data['id']         = $user->getId();
        $event->setData($data);
    }
}
