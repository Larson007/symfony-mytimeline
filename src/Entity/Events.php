<?php

namespace App\Entity;

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
     * @ORM\Column(type="integer")
     * @Groups({"events_read", "timelines_read"})
     */
    private $year;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Groups({"events_read", "timelines_read"})
     */
    private $month;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Groups({"events_read", "timelines_read"})
     */
    private $day;

    /**
     * @ORM\Column(type="time", nullable=true)
     * @Groups({"events_read", "timelines_read"})
     */
    private $time;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"events_read", "timelines_read"})
     */
    private $end_year;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Groups({"events_read", "timelines_read"})
     */
    private $end_month;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Groups({"events_read", "timelines_read"})
     */
    private $end_day;

    /**
     * @ORM\Column(type="time", nullable=true)
     * @Groups({"events_read", "timelines_read"})
     */
    private $end_time;

    /**
     * @ORM\Column(type="date", nullable=true)
     * @Groups({"events_read", "timelines_read"})
     */
    private $display_date;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"events_read", "timelines_read"})
     */
    private $headline;

    /**
     * @ORM\Column(type="text")
     * @Groups({"events_read", "timelines_read"})
     */
    private $text;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"events_read", "timelines_read"})
     */
    private $media;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"events_read", "timelines_read"})
     */
    private $media_credit;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"events_read", "timelines_read"})
     */
    private $media_caption;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"events_read", "timelines_read"})
     */
    private $media_thumbnail;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"events_read", "timelines_read"})
     */
    private $background;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"events_read", "timelines_read"})
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity=Timelines::class, inversedBy="events")
     * @Groups({"events_read"})
     */
    private $timelines;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(int $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getMonth(): ?int
    {
        return $this->month;
    }

    public function setMonth(?int $month): self
    {
        $this->month = $month;

        return $this;
    }

    public function getDay(): ?int
    {
        return $this->day;
    }

    public function setDay(?int $day): self
    {
        $this->day = $day;

        return $this;
    }

    public function getTime(): ?\DateTimeInterface
    {
        return $this->time;
    }

    public function setTime(?\DateTimeInterface $time): self
    {
        $this->time = $time;

        return $this;
    }

    public function getEndYear(): ?int
    {
        return $this->end_year;
    }

    public function setEndYear(int $end_year): self
    {
        $this->end_year = $end_year;

        return $this;
    }

    public function getEndMonth(): ?int
    {
        return $this->end_month;
    }

    public function setEndMonth(?int $end_month): self
    {
        $this->end_month = $end_month;

        return $this;
    }

    public function getEndDay(): ?int
    {
        return $this->end_day;
    }

    public function setEndDay(?int $end_day): self
    {
        $this->end_day = $end_day;

        return $this;
    }

    public function getEndTime(): ?\DateTimeInterface
    {
        return $this->end_time;
    }

    public function setEndTime(?\DateTimeInterface $end_time): self
    {
        $this->end_time = $end_time;

        return $this;
    }

    public function getDisplayDate(): ?\DateTimeInterface
    {
        return $this->display_date;
    }

    public function setDisplayDate(?\DateTimeInterface $display_date): self
    {
        $this->display_date = $display_date;

        return $this;
    }

    public function getHeadline(): ?string
    {
        return $this->headline;
    }

    public function setHeadline(string $headline): self
    {
        $this->headline = $headline;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getMedia(): ?string
    {
        return $this->media;
    }

    public function setMedia(?string $media): self
    {
        $this->media = $media;

        return $this;
    }

    public function getMediaCredit(): ?string
    {
        return $this->media_credit;
    }

    public function setMediaCredit(?string $media_credit): self
    {
        $this->media_credit = $media_credit;

        return $this;
    }

    public function getMediaCaption(): ?string
    {
        return $this->media_caption;
    }

    public function setMediaCaption(?string $media_caption): self
    {
        $this->media_caption = $media_caption;

        return $this;
    }

    public function getMediaThumbnail(): ?string
    {
        return $this->media_thumbnail;
    }

    public function setMediaThumbnail(?string $media_thumbnail): self
    {
        $this->media_thumbnail = $media_thumbnail;

        return $this;
    }

    public function getBackground(): ?string
    {
        return $this->background;
    }

    public function setBackground(?string $background): self
    {
        $this->background = $background;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
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

}
