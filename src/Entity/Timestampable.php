<?php

namespace App\Entity;

trait  Timestampable
{
    /**
     * @ORM\Column (type="datetime")
     */
    private \DateTimeInterface $createdAt;

    /**
     * @ORM\Column (type="datetime",nullable=true)
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
