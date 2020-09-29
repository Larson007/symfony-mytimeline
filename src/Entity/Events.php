<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\EventsRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=EventsRepository::class)
 * @ApiResource(normalizationContext={"groups"={"events_read"}})
 */
class Events
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"events_read", "timelines_read"})
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Timelines::class, inversedBy="events")
     * @Groups({"events_read"})
     */
    private $timelines;

    /**
     * @ORM\OneToMany(targetEntity=StartDate::class, mappedBy="events")
     * @Groups({"events_read","timelines_read"})
     */
    private $start_date;

    /**
     * @ORM\OneToMany(targetEntity=Text::class, mappedBy="events")
     * @Groups({"events_read","timelines_read"})
     */
    private $text;

    /**
     * @ORM\OneToMany(targetEntity=Media::class, mappedBy="events")
     * @Groups({"events_read","timelines_read"})
     */
    private $media;

    /**
     * @ORM\OneToMany(targetEntity=Background::class, mappedBy="events")
     * @Groups({"events_read","timelines_read"})
     */
    private $background;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function __construct()
    {
        $this->start_date = new ArrayCollection();
        $this->text = new ArrayCollection();
        $this->media = new ArrayCollection();
        $this->background = new ArrayCollection();
    }

    public function getTimelines(): ?Timelines
    {
        return $this->timelines;
    }

    public function setTimelines(?Timelines $timelines): self
    {
        $this->timelines = $timelines;

        return $this;
    }

    /**
     * @return Collection|StartDate[]
     */
    public function getStartDate(): Collection
    {
        return $this->start_date;
    }

    public function addStartDate(StartDate $startDate): self
    {
        if (!$this->start_date->contains($startDate)) {
            $this->start_date[] = $startDate;
            $startDate->setEvents($this);
        }

        return $this;
    }

    public function removeStartDate(StartDate $startDate): self
    {
        if ($this->start_date->contains($startDate)) {
            $this->start_date->removeElement($startDate);
            // set the owning side to null (unless already changed)
            if ($startDate->getEvents() === $this) {
                $startDate->setEvents(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Text[]
     */
    public function getText(): Collection
    {
        return $this->text;
    }

    public function addText(Text $text): self
    {
        if (!$this->text->contains($text)) {
            $this->text[] = $text;
            $text->setEvents($this);
        }

        return $this;
    }

    public function removeText(Text $text): self
    {
        if ($this->text->contains($text)) {
            $this->text->removeElement($text);
            // set the owning side to null (unless already changed)
            if ($text->getEvents() === $this) {
                $text->setEvents(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Media[]
     */
    public function getMedia(): Collection
    {
        return $this->media;
    }

    public function addMedium(Media $medium): self
    {
        if (!$this->media->contains($medium)) {
            $this->media[] = $medium;
            $medium->setEvents($this);
        }

        return $this;
    }

    public function removeMedium(Media $medium): self
    {
        if ($this->media->contains($medium)) {
            $this->media->removeElement($medium);
            // set the owning side to null (unless already changed)
            if ($medium->getEvents() === $this) {
                $medium->setEvents(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Background[]
     */
    public function getBackground(): Collection
    {
        return $this->background;
    }

    public function addBackground(Background $background): self
    {
        if (!$this->background->contains($background)) {
            $this->background[] = $background;
            $background->setEvents($this);
        }

        return $this;
    }

    public function removeBackground(Background $background): self
    {
        if ($this->background->contains($background)) {
            $this->background->removeElement($background);
            // set the owning side to null (unless already changed)
            if ($background->getEvents() === $this) {
                $background->setEvents(null);
            }
        }

        return $this;
    }

}
