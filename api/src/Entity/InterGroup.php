<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\InterGroupRepository")
 */
class InterGroup
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\InterUser", inversedBy="interGroups")
     */
    private $interUsers;

    public function __construct()
    {
        $this->interUsers = new ArrayCollection();
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

    /**
     * @return Collection|InterUser[]
     */
    public function getInterUsers(): Collection
    {
        return $this->interUsers;
    }

    public function addInterUsers(InterUser $interUser): self
    {
        if (!$this->interUsers->contains($interUser)) {
            $this->interUsers[] = $interUser;
        }

        return $this;
    }

    public function removeInterUsers(InterUser $interUser): self
    {
        if ($this->interUsers->contains($interUser)) {
            $this->interUsers->removeElement($interUser);
        }

        return $this;
    }
}
