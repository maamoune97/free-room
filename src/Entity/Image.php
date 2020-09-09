<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ImageRepository;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=ImageRepository::class)
 */
class Image
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
    private $url;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"rooms_read"})
     */
    private $caption;

    /**
     * @ORM\ManyToOne(targetEntity=Room::class, inversedBy="images")
     * @ORM\JoinColumn(nullable=false)
     */
    private $room;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getCaption(): ?string
    {
        return $this->caption;
    }

    public function setCaption(?string $caption): self
    {
        $this->caption = $caption;

        return $this;
    }

    public function getRoom(): ?Room
    {
        return $this->room;
    }

    public function setRoom(?Room $room): self
    {
        $this->room = $room;

        return $this;
    }
}
