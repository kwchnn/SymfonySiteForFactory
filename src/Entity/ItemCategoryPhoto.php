<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ItemCategoryPhoto
 *
 * @ORM\Table(name="item_category_photo")
 * @ORM\Entity
 */
class ItemCategoryPhoto
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int|null
     *
     * @ORM\Column(name="item_category_id", type="integer", nullable=true)
     */
    private $itemCategoryId;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="alt", type="string", length=255, nullable=true)
     */
    private $alt;

    /**
     * @var ItemCategory
     *
     *@ORM\ManyToOne(targetEntity="App\Entity\ItemCategory", inversedBy="itemCategoryPhoto")
     */
    private $itemCategory;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getItemCategoryId(): ?int
    {
        return $this->itemCategoryId;
    }

    public function setItemCategoryId(?int $itemCategoryId): self
    {
        $this->itemCategoryId = $itemCategoryId;

        return $this;
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

    public function getAlt(): ?string
    {
        return $this->alt;
    }

    public function setAlt(?string $alt): self
    {
        $this->alt = $alt;

        return $this;
    }

    public function getItemCategory(): ?ItemCategory
    {
        return $this->itemCategory;
    }

    public function setItemCategory(?ItemCategory $itemCategory): self
    {
        $this->itemCategory = $itemCategory;

        return $this;
    }
}
