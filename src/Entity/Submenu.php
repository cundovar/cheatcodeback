<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\SubmenuRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=SubmenuRepository::class)
 * @ApiResource(
 *     normalizationContext={"groups"={"submenu:read"}}
 * )
 */
class Submenu
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"submenu:read", "menu:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"submenu:read", "menu:read"})
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Submenu", inversedBy="children")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $parent;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Submenu", mappedBy="parent")
     * @Groups({"submenu:read", "menu:read"})
     */
    private $children;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\MenuContent", mappedBy="submenu", cascade={"persist", "remove"})
     * @Groups({"submenu:read", "menu:read"})
     */
    private $menuContents;

    /**
     * @ORM\ManyToOne(targetEntity=Menu::class, inversedBy="submenus")
     * @Groups({"submenu:read"})
     */
    private $menu;

    public function __construct()
    {
        $this->children = new ArrayCollection();
        $this->menuContents = new ArrayCollection();
    }

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

    public function getParent(): ?self
    {
        return $this->parent;
    }

    public function setParent(?self $parent): self
    {
        $this->parent = $parent;
        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getChildren(): Collection
    {
        return $this->children;
    }

    public function addChild(self $child): self
    {
        if (!$this->children->contains($child)) {
            $this->children[] = $child;
            $child->setParent($this);
        }

        return $this;
    }

    public function removeChild(self $child): self
    {
        if ($this->children->removeElement($child)) {
            if ($child->getParent() === $this) {
                $child->setParent(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|MenuContent[]
     */
    public function getMenuContents(): Collection
    {
        return $this->menuContents;
    }

    public function addMenuContent(MenuContent $menuContent): self
    {
        if (!$this->menuContents->contains($menuContent)) {
            $this->menuContents[] = $menuContent;
            $menuContent->setSubmenu($this);
        }

        return $this;
    }

    public function removeMenuContent(MenuContent $menuContent): self
    {
        if ($this->menuContents->removeElement($menuContent)) {
            if ($menuContent->getSubmenu() === $this) {
                $menuContent->setSubmenu(null);
            }
        }

        return $this;
    }

    public function getMenu(): ?Menu
    {
        return $this->menu;
    }

    public function setMenu(?Menu $menu): self
    {
        $this->menu = $menu;
        return $this;
    }

    public function __toString(): string
    {
        return $this->name; // Assurez-vous que $this->name n'est pas null
    }


}
