<?php

namespace App\Controller;

use App\Entity\Voiture;

class VoitureUpdatedAt
{
    public function __invoke(Voiture $data): Voiture
    {
        $data->setUpdatedAt(new \DateTimeImmutable());
        return $data;
    }
}
