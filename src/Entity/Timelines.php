<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\TimelinesRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=TimelinesRepository::class)
 * @ApiResource(normalizationContext={"groups"={"timelines_read"}})
 */
class Timelines
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"timelines_read","categories_read","events_read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"timelines_read","categories_read","events_read"})
     */
    private $title;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"timelines_read","categories_read","events_read"})
     */
    private $start_date;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Groups({"timelines_read","categories_read","events_read"})
     */
    private $end_date;

    /**
     * @ORM\Column(type="text")
     * @Groups({"timelines_read","categories_read","events_read"})
     */
    private $description;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Groups({"timelines_read","categories_read","events_read"})
     */
    private $publication_date;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"timelines_read","categories_read","events_read"})
     */
    private $thumbnail;

    /**
     * @ORM\ManyToOne(targetEntity=Categories::class, inversedBy="timelines")
     * @Groups({"timelines_read"})
     */
    private $categories;

    /**
     * @ORM\OneToMany(targetEntity=Events::class, mappedBy="timelines")
     * @Groups({"timelines_read"})
     */
    private $events;

    public function __construct()
    {
        $this->events = new ArrayCollection();
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

    public function getStartDate(): ?int
    {
        return $this->start_date;
    }

    public function setStartDate(int $start_date): self
    {
        $this->start_date = $start_date;

        return $this;
    }

    public function getEndDate(): ?int
    {
        return $this->end_date;
    }

    public function setEndDate(?int $end_date): self
    {
        $this->end_date = $end_date;

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

    public function getPublicationDate(): ?\DateTimeInterface
    {
        return $this->publication_date;
    }

    public function setPublicationDate(?\DateTimeInterface $publication_date): self
    {
        $this->publication_date = $publication_date;

        return $this;
    }

    public function getThumbnail(): ?string
    {
        return $this->thumbnail;
    }

    public function setThumbnail(string $thumbnail): self
    {
        $this->thumbnail = $thumbnail;

        return $this;
    }

    public function getCategories(): ?Categories
    {
        return $this->categories;
    }

    public function setCategories(?Categories $categories): self
    {
        $this->categories = $categories;

        return $this;
    }

    /**
     * @return Collection|Events[]
     */
    public function getEvents(): Collection
    {
        return $this->events;
    }

    public function addEvent(Events $event): self
    {
        if (!$this->events->contains($event)) {
            $this->events[] = $event;
            $event->setTimelines($this);
        }

        return $this;
    }

    public function removeEvent(Events $event): self
    {
        if ($this->events->contains($event)) {
            $this->events->removeElement($event);
            // set the owning side to null (unless already changed)
            if ($event->getTimelines() === $this) {
                $event->setTimelines(null);
            }
        }

        return $this;
    }

}
