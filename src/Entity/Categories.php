<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\CategoriesRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=CategoriesRepository::class)
 * @ApiResource(
 *      collectionOperations={"GET", "POST"},
 *      itemOperations={"GET"},
 *      normalizationContext={"groups"={"categories_read"}}
 * )
 */
class Categories
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"categories_read", "timelines_read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"categories_read", "timelines_read"})
     * 
     */
    private $themes;

    /**
     * @ORM\OneToMany(targetEntity=Timelines::class, mappedBy="categories")
     * @Groups({"categories_read"})
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
