<?php

namespace App\Entity;

trait  Timestampable
{
    /**
     * @ORM\Column (type="datetime")
     * @Groups({
     *      "user_read",
     *      "user_details_read",
     *      "voiture_details_read",
     *      "voiture_read"
     * })
     */
    private \DateTimeInterface $createdAt;

    /**
     * @ORM\Column (type="datetime",nullable=true)
     * @Groups({
     *      "user_read",
     *      "user_details_read",
     *      "voiture_details_read",
     *      "voiture_read"
     * })
     */
    private ?\DateTimeInterface $updatedAt;


    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
