<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 */
class Category
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
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $color;

    /**
     * @ORM\ManyToMany(targetEntity=Build::class, mappedBy="categories")
     */
    private $builds;

    /**
     * @ORM\ManyToMany(targetEntity=Killer::class, mappedBy="categories")
     */
    private $killers;

    public function __construct()
    {
        $this->builds = new ArrayCollection();
        $this->killers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): self
    {
        $this->color = $color;

        return $this;
    }

    /**
     * @return Collection<int, Build>
     */
    public function getBuilds(): Collection
    {
        return $this->builds;
    }

    public function addBuilds(Build $build): self
    {
        if (!$this->builds->contains($build)) {
            $this->builds[] = $build;
        }

        return $this;
    }

    public function removeBuild(Build $build): self
    {
        $this->builds->removeElement($build);

        return $this;
    }

    //Ajout?? poue easyAdmin
    public function __toString()
    {
        return $this->name;
    }

    /**
     * @return Collection<int, Killer>
     */
    public function getKillers(): Collection
    {
        return $this->killers;
    }

    public function addKiller(Killer $killer): self
    {
        if (!$this->killers->contains($killer)) {
            $this->killers[] = $killer;
            $killer->addCategory($this);
        }

        return $this;
    }

    public function removeKiller(Killer $killer): self
    {
        if ($this->killers->removeElement($killer)) {
            $killer->removeCategory($this);
        }

        return $this;
    }

    
}
