<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\TextRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=TextRepository::class)
 * @ApiResource(normalizationContext={"groups"={"text"}})
 */
class Text
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"text", "events_read","timelines_read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"text", "events_read","timelines_read"})
     */
    private $headline;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"text", "events_read","timelines_read"})
     */
    private $text;

    /**
     * @ORM\ManyToOne(targetEntity=Events::class, inversedBy="text")
     */
    private $events;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHeadline(): ?string
    {
        return $this->headline;
    }

    public function setHeadline(?string $headline): self
    {
        $this->headline = $headline;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text): self
    {
        $this->text = $text;

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
