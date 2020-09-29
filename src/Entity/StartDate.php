<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\StartDateRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=StartDateRepository::class)
 * @ApiResource(normalizationContext={"groups"={"start_date"}})
 */
class StartDate
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"start_date", "events_read","timelines_read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"start_date", "events_read","timelines_read"})
     */
    private $year;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"start_date", "events_read","timelines_read"})
     */
    private $month;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"start_date", "events_read","timelines_read"})
     */
    private $day;

    /**
     * @ORM\ManyToOne(targetEntity=Events::class, inversedBy="start_date")
     * @Groups({"start_date"})
     */
    private $events;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getYear(): ?string
    {
        return $this->year;
    }

    public function setYear(?string $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getMonth(): ?string
    {
        return $this->month;
    }

    public function setMonth(?string $month): self
    {
        $this->month = $month;

        return $this;
    }

    public function getDay(): ?string
    {
        return $this->day;
    }

    public function setDay(?string $day): self
    {
        $this->day = $day;

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
