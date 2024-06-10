<?php

namespace App\Entity;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\MenuContentRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 *  @ApiResource(
 *     normalizationContext={"groups"={"menucontent:read"}}
 * )
 * @ORM\Entity(repositoryClass=MenuContentRepository::class)
 */
class MenuContent
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"menucontent:read", "submenu:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"menucontent:read", "submenu:read"})
     */
    private $title;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"menucontent:read", "submenu:read"})
     */
    private $content;

     /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Submenu", inversedBy="menuContents")
     * @ORM\JoinColumn(nullable=true)
     * @Groups({"menucontent:read"})
     */
    private $submenu;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"menucontent:read", "submenu:read"})
     */
    private $para;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"menucontent:read", "submenu:read"})
     */
    private $para1;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"menucontent:read", "submenu:read"})
     */
    private $content1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"menucontent:read", "submenu:read"})
     */
    private $image;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getSubmenu(): ?Submenu
    {
        return $this->submenu;
    }

    public function setSubmenu(?Submenu $submenu): self
    {
        $this->submenu = $submenu;

        return $this;
    }

    public function getPara(): ?string
    {
        return $this->para;
    }

    public function setPara(?string $para): self
    {
        $this->para = $para;

        return $this;
    }

    public function getPara1(): ?string
    {
        return $this->para1;
    }

    public function setPara1(?string $para1): self
    {
        $this->para1 = $para1;

        return $this;
    }

    public function getContent1(): ?string
    {
        return $this->content1;
    }

    public function setContent1(?string $content1): self
    {
        $this->content1 = $content1;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }
}
