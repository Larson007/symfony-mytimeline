<?php

namespace App\Entity;

use App\Repository\CategoriesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoriesRepository::class)
 */
class Categories
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $themes;

    /**
     * @ORM\OneToMany(targetEntity=Timelines::class, mappedBy="categories")
     */
    private $timelines;

    public function __construct()
    {
        $this->timelines = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getThemes(): ?string
    {
        return $this->themes;
    }

    public function setThemes(string $themes): self
    {
        $this->themes = $themes;

        return $this;
    }

    /**
     * @return Collection|Timelines[]
     */
    public function getTimelines(): Collection
    {
        return $this->timelines;
    }

    public function addTimeline(Timelines $timeline): self
    {
        if (!$this->timelines->contains($timeline)) {
            $this->timelines[] = $timeline;
            $timeline->setCategories($this);
        }

        return $this;
    }

    public function removeTimeline(Timelines $timeline): self
    {
        if ($this->timelines->contains($timeline)) {
            $this->timelines->removeElement($timeline);
            // set the owning side to null (unless already changed)
            if ($timeline->getCategories() === $this) {
                $timeline->setCategories(null);
            }
        }

        return $this;
    }

}
