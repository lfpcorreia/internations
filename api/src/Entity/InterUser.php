<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\InterUserRepository")
 */
class InterUser
{
    /**
    * @var \Ramsey\Uuid\UuidInterface
    *
    * @ORM\Id()
    * @ORM\Column(type="uuid", unique=true)
    * @ORM\GeneratedValue(strategy="CUSTOM")
    * @ORM\CustomIdGenerator(class="Ramsey\Uuid\Doctrine\UuidGenerator")
    */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\InterGroup", mappedBy="interUsers")
     */
    private $interGroups;

    public function __construct()
    {
        $this->interGroups = new ArrayCollection();
    }

    public function getId(): ?string
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
     * @return Collection|InterGroup[]
     */
    public function getInterGroups(): Collection
    {
        return $this->interGroups;
    }

    public function addInterGroup(InterGroup $interGroup): self
    {
        if (!$this->interGroups->contains($interGroup)) {
            $this->interGroups[] = $interGroup;
            $interGroup->addInterUsers($this);
        }

        return $this;
    }

    public function removeInterGroup(InterGroup $interGroup): self
    {
        if ($this->interGroups->contains($interGroup)) {
            $this->interGroups->removeElement($interGroup);
            $interGroup->removeInterUsers($this);
        }

        return $this;
    }
}
