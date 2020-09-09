<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\RoomRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=RoomRepository::class)
 * @ApiResource(
 *  normalizationContext={
 *      "groups"={"rooms_read"}
 *  }
 * )
 */
class Room
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"rooms_read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"rooms_read"})
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     * @Groups({"rooms_read"})
     */
    private $description;

    /**
     * @ORM\Column(type="float")
     * @Groups({"rooms_read"})
     */
    private $surface;

    /**
     * @ORM\Column(type="float")
     * @Groups({"rooms_read"})
     */
    private $price;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"rooms_read"})
     */
    private $floor;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="rooms")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"rooms_read"})
     */
    private $owner;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"rooms_read"})
     */
    private $rented;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"rooms_read"})
     */
    private $createdAt;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"rooms_read"})
     */
    private $coverImage;

    /**
     * @ORM\OneToMany(targetEntity=Image::class, mappedBy="room", orphanRemoval=true)
     * @Groups({"rooms_read"})
     */
    private $images;

    public function __construct()
    {
        $this->images = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

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

    public function getSurface(): ?float
    {
        return $this->surface;
    }

    public function setSurface(float $surface): self
    {
        $this->surface = $surface;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getFloor(): ?int
    {
        return $this->floor;
    }

    public function setFloor(int $floor): self
    {
        $this->floor = $floor;

        return $this;
    }

    public function getOwner(): ?User
    {
        return $this->owner;
    }

    public function setOwner(?User $owner): self
    {
        $this->owner = $owner;

        return $this;
    }

    public function getRented(): ?bool
    {
        return $this->rented;
    }

    public function setRented(bool $rented): self
    {
        $this->rented = $rented;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getCoverImage(): ?string
    {
        return $this->coverImage;
    }

    public function setCoverImage(?string $coverImage): self
    {
        $this->coverImage = $coverImage;

        return $this;
    }

    /**
     * @return Collection|Image[]
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(Image $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->setRoom($this);
        }

        return $this;
    }

    public function removeImage(Image $image): self
    {
        if ($this->images->contains($image)) {
            $this->images->removeElement($image);
            // set the owning side to null (unless already changed)
            if ($image->getRoom() === $this) {
                $image->setRoom(null);
            }
        }

        return $this;
    }
}
