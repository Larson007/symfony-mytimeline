<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\BackgroundRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=BackgroundRepository::class)
 * @ApiResource(
 *      collectionOperations={"GET", "POST"},
 *      itemOperations={"GET"},
 *      normalizationContext={"groups"={"background"}}
 * )
 */
class Background
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"background", "events_read","timelines_read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"background", "events_read","timelines_read"})
     */
    private $color;

    /**
     * @ORM\ManyToOne(targetEntity=Events::class, inversedBy="background")
     */
    private $events;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(?string $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getEvents(): ?Events
    {
        return $this->events;
    }

    public function setEvents(?Events $events): self
    {
        $this->events = $events;

        return $this;
    }
}
