<?php

namespace App\Entity;

use App\Repository\GenreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GenreRepository::class)]
class Genre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 55)]
    private ?string $title = null;

    #[ORM\OneToMany(mappedBy: 'genre', targetEntity: SubGenre::class, orphanRemoval: true)]
    private Collection $subgenres;

    public function __construct()
    {
        $this->subgenres = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return Collection<int, SubGenre>
     */
    public function getSubgenres(): Collection
    {
        return $this->subgenres;
    }

    public function addSubgenre(SubGenre $subgenre): static
    {
        if (!$this->subgenres->contains($subgenre)) {
            $this->subgenres->add($subgenre);
            $subgenre->setGenre($this);
        }

        return $this;
    }

    public function removeSubgenre(SubGenre $subgenre): static
    {
        if ($this->subgenres->removeElement($subgenre)) {
            // set the owning side to null (unless already changed)
            if ($subgenre->getGenre() === $this) {
                $subgenre->setGenre(null);
            }
        }

        return $this;
    }
}
