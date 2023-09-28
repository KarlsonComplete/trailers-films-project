<?php

namespace App\Entity;

use App\Repository\FilmRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FilmRepository::class)]
class Film
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 155)]
    private ?string $name = null;

    #[ORM\ManyToMany(targetEntity: Country::class, inversedBy: 'films')]
    private Collection $countries;

    #[ORM\ManyToOne(inversedBy: 'films')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Year $year = null;

    #[ORM\ManyToMany(targetEntity: Genre::class, inversedBy: 'films')]
    private Collection $genres;

    #[ORM\ManyToMany(targetEntity: SubGenre::class, inversedBy: 'films')]
    private Collection $subGenres;

    #[ORM\Column(length: 155, nullable: true)]
    private ?string $pathPhoto = null;

    #[ORM\Column(length: 1024, nullable: true)]
    private ?string $descriptionFilm = null;

    public function __construct()
    {
        $this->countries = new ArrayCollection();
        $this->genres = new ArrayCollection();
        $this->subGenres = new ArrayCollection();
    }
    public function __toString(): string
    {
        return $this->name;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, Country>
     */
    public function getCountries(): Collection
    {
        return $this->countries;
    }

    public function addCountry(Country $country): static
    {
        if (!$this->countries->contains($country)) {
            $this->countries->add($country);
        }

        return $this;
    }

    public function removeCountry(Country $country): static
    {
        $this->countries->removeElement($country);

        return $this;
    }

    public function getYear(): ?Year
    {
        return $this->year;
    }

    public function setYear(?Year $year): static
    {
        $this->year = $year;

        return $this;
    }

    /**
     * @return Collection<int, Genre>
     */
    public function getGenres(): Collection
    {
        return $this->genres;
    }

    public function addGenre(Genre $genre): static
    {
        if (!$this->genres->contains($genre)) {
            $this->genres->add($genre);
        }

        return $this;
    }

    public function removeGenre(Genre $genre): static
    {
        $this->genres->removeElement($genre);

        return $this;
    }

    /**
     * @return Collection<int, SubGenre>
     */
    public function getSubGenres(): Collection
    {
        return $this->subGenres;
    }

    public function addSubGenre(SubGenre $subGenre): static
    {
        if (!$this->subGenres->contains($subGenre)) {
            $this->subGenres->add($subGenre);
        }

        return $this;
    }

    public function removeSubGenre(SubGenre $subGenre): static
    {
        $this->subGenres->removeElement($subGenre);

        return $this;
    }

    public function getPathPhoto(): ?string
    {
        return $this->pathPhoto;
    }

    public function setPathPhoto(?string $pathPhoto): static
    {
        $this->pathPhoto = $pathPhoto;

        return $this;
    }

    public function getDescriptionFilm(): ?string
    {
        return $this->descriptionFilm;
    }

    public function setDescriptionFilm(?string $descriptionFilm): static
    {
        $this->descriptionFilm = $descriptionFilm;

        return $this;
    }

}
