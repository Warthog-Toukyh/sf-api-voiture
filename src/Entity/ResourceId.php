<?php

namespace App\Entity;

trait ResourceId
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({
     *      "user_read",
     *      "user_details_read",
     *      "voiture_details_read",
     *      "voiture_read"
     * })
     */
    private $id;

    public function getId(): ?int
    {
        return $this->id;
    }
}
