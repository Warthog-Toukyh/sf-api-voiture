<?php

namespace App\Entity;

use App\Repository\VoitureRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Controller\VoitureUpdatedAt;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=VoitureRepository::class)
 * @ApiResource(
 *      collectionOperations={
 *          "get"={
 *              "normalization_context"={"groups"={"voiture_read"}}
 *          },
 *          "post"
 *      },
 *      itemOperations={
 *          "get"={
 *              "normalization_context"={"groups"={"voiture_details_read"}}
 *          },
 *          "put",
 *          "patch",
 *          "delete",
 *          "put_updated_at"={
 *              "method"="PUT",
 *              "path"="/voitures/{id}",
 *              "controller"=VoitureUpdatedAt::class,
 *          }
 *      }
 * )
 */
class Voiture
{
    use ResourceId;
    use Timestampable;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({
     *      "voiture_read",
     *      "user_details_read",
     *      "voiture_details_read"
     * })
     */
    private $marque;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({
     *      "user_details_read",
     *      "voiture_read",
     *      "voiture_details_read"
     * })
     */
    private $modele;

    /**
     * @ORM\Column(type="date")
     * @Groups({
     *      "user_details_read",
     *      "voiture_read",
     *      "voiture_details_read"
     * })
     */
    private $edition;

    /**
     * @ORM\Column(type="text")
     * @Groups({
     *      "voiture_read",
     *      "voiture_details_read"
     * })
     */
    private $description;


    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="voitures")
     * @Groups({
     *      "voiture_details_read"
     * })
     */
    private UserInterface $author;

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
    }

    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque(string $marque): self
    {
        $this->marque = $marque;

        return $this;
    }

    public function getModele(): ?string
    {
        return $this->modele;
    }

    public function setModele(string $modele): self
    {
        $this->modele = $modele;

        return $this;
    }

    public function getEdition(): ?\DateTimeInterface
    {
        return $this->edition;
    }

    public function setEdition(\DateTimeInterface $edition): self
    {
        $this->edition = $edition;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getAuthor(): UserInterface
    {
        return $this->author;
    }

    public function setAuthor(UserInterface $author): self
    {
        $this->author = $author;

        return $this;
    }
}
