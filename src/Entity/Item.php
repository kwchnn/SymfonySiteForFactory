<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Item
 *
 * @ORM\Table(name="item")
 * @ORM\Entity
 */
class Item
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
     * @var int
     *
     * @ORM\Column(name="sort", type="integer", nullable=false)
     */
    private $sort;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=true)
     */
    private $description;

    /**
     * @var string|null
     *
     * @ORM\Column(name="params", type="text", length=65535, nullable=true)
     */
    private $params;

    /**
     * @var int|null
     *
     * @ORM\Column(name="price", type="integer", nullable=true)
     */
    private $price;

    /**
     * @var string|null
     *
     * @ORM\Column(name="seo_title", type="string", length=128, nullable=true)
     */
    private $seoTitle;

    /**
     * @var string|null
     *
     * @ORM\Column(name="seo_descriptions", type="text", length=65535, nullable=true)
     */
    private $seoDescriptions;

    /**
     * @var ItemCategory
     * 
     * @ORM\ManyToOne(targetEntity="App\Entity\ItemCategory", inversedBy="Item")
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

    public function getSort(): ?int
    {
        return $this->sort;
    }

    public function setSort(int $sort): self
    {
        $this->sort = $sort;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getParams(): ?string
    {
        return $this->params;
    }

    public function setParams(?string $params): self
    {
        $this->params = $params;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(?int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getSeoTitle(): ?string
    {
        return $this->seoTitle;
    }

    public function setSeoTitle(?string $seoTitle): self
    {
        $this->seoTitle = $seoTitle;

        return $this;
    }

    public function getSeoDescriptions(): ?string
    {
        return $this->seoDescriptions;
    }

    public function setSeoDescriptions(?string $seoDescriptions): self
    {
        $this->seoDescriptions = $seoDescriptions;

        return $this;
    }


}
