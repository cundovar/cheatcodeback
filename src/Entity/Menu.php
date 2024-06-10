<?php

namespace App\Entity;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\MenuRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"menu:read"}}
 * )
 * @ORM\Entity(repositoryClass=MenuRepository::class)
 */
class Menu
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"menu:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"menu:read"})
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=Submenu::class, mappedBy="menu", cascade={"persist", "remove"})
     * @Groups({"menu:read"})
     */
    private $submenus;

  
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }
    public function __construct()
    {
        $this->submenus = new ArrayCollection();
    }
    /**
     * @return Collection<int, Submenu>
     */
    public function getSubmenus(): Collection
    {
        return $this->submenus;
    }

    public function addSubmenu(Submenu $submenu): self
    {
        if (!$this->submenus->contains($submenu)) {
            $this->submenus[] = $submenu;
            $submenu->setMenu($this);
        }

        return $this;
    }

    public function removeSubmenu(Submenu $submenu): self
    {
        if ($this->submenus->removeElement($submenu)) {
            // set the owning side to null (unless already changed)
            if ($submenu->getMenu() === $this) {
                $submenu->setMenu(null);
            }
        }

        return $this;
    }
    public function __toString(): string
    {
        return $this->name; // Assurez-vous que $this->name n'est pas null
    }

    
}
