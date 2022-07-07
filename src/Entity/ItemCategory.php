<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * ItemCategory
 *
 * @ORM\Table(name="item_category")
 * @ORM\Entity(repositoryClass="App\Repository\ItemCategoryRepository")
 */
class ItemCategory
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
     * @var int
     *
     * @ORM\Column(name="parent_id", type="integer", nullable=false)
     */
    private $parentId;

    /**
     * @var int
     *
     * @ORM\Column(name="sort", type="integer", nullable=false)
     */
    private $sort;

    /**
     * @var int
     *
     * @ORM\Column(name="switch", type="integer", nullable=false)
     */
    private $switch;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="url", type="string", length=128, nullable=true)
     */
    private $url;

    /**
     * @var string|null
     *
     * @ORM\Column(name="icon", type="string", length=128, nullable=true)
     */
    private $icon;

    /**
     * @var string|null
     *
     * @ORM\Column(name="short_description", type="string", length=128, nullable=true)
     */
    private $shortDescription;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=true, options={"comment"="описание "})
     */
    private $description;

    /**
     * @var string|null
     *
     * @ORM\Column(name="params", type="text", length=65535, nullable=true)
     */
    private $params;

    /**
     * @var string|null
     *
     * @ORM\Column(name="bottom_text", type="text", length=65535, nullable=true)
     */
    private $bottomText;

    /**
     * @var string|null
     *
     * @ORM\Column(name="seo_title", type="string", length=128, nullable=true)
     */
    private $seoTitle;

    /**
     * @var string|null
     *
     * @ORM\Column(name="seo_description", type="text", length=65535, nullable=true)
     */
    private $seoDescription;

    /**
     * @var ItemCategoryPhoto[]
     *
     * @ORM\OneToMany(targetEntity="App\Entity\ItemCategoryPhoto", mappedBy="itemCategory")
     */
    private $itemCategoryPhoto;

    /**
     * @var Item[]
     * 
     * @ORM\OneToMany(targetEntity="App\Entity\Item", mappedBy="itemCategory")
     */
    private $item;
    
    /**
     * @var CategoryComment[]
     * 
     * @ORM\OneToMany(targetEntity="App\Entity\CategoryComment", mappedBy="itemCategory")
     */
    private $categoryComment;

    public function __construct()
    {
        $this->itemCategoryPhoto = new ArrayCollection();
        $this->item = new ArrayCollection();
        $this->categoryComment = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getParentId(): ?int
    {
        return $this->parentId;
    }

    public function setParentId(int $parentId): self
    {
        $this->parentId = $parentId;

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

    public function getSwitch(): ?int
    {
        return $this->switch;
    }

    public function setSwitch(int $switch): self
    {
        $this->switch = $switch;

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

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    public function setIcon(?string $icon): self
    {
        $this->icon = $icon;

        return $this;
    }

    public function getShortDescription(): ?string
    {
        return $this->shortDescription;
    }

    public function setShortDescription(?string $shortDescription): self
    {
        $this->shortDescription = $shortDescription;

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

    public function getBottomText(): ?string
    {
        return $this->bottomText;
    }

    public function setBottomText(?string $bottomText): self
    {
        $this->bottomText = $bottomText;

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

    public function getSeoDescription(): ?string
    {
        return $this->seoDescription;
    }

    public function setSeoDescription(?string $seoDescription): self
    {
        $this->seoDescription = $seoDescription;

        return $this;
    }

    /**
     * @return Collection<int, ItemCategoryPhoto>
     */
    public function getItemCategoryPhoto(): Collection
    {
        return $this->itemCategoryPhoto;
    }

    public function addItemCategoryPhoto(ItemCategoryPhoto $itemCategoryPhoto): self
    {
        if (!$this->itemCategoryPhoto->contains($itemCategoryPhoto)) {
            $this->itemCategoryPhoto[] = $itemCategoryPhoto;
            $itemCategoryPhoto->setItemCategoryPhoto($this);
        }

        return $this;
    }

    public function removeItemCategoryPhoto(ItemCategoryPhoto $itemCategoryPhoto): self
    {
        if ($this->itemCategoryPhoto->removeElement($itemCategoryPhoto)) {
            // set the owning side to null (unless already changed)
            if ($itemCategoryPhoto->getItemCategoryPhoto() === $this) {
                $itemCategoryPhoto->setItemCategoryPhoto(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Item>
     */
    public function getItem(): Collection
    {
        return $this->item;
    }

    public function addItem(Item $item): self
    {
        if (!$this->item->contains($item)) {
            $this->item[] = $item;
            $item->setItemCategory($this);
        }

        return $this;
    }

    public function removeItem(Item $item): self
    {
        if ($this->item->removeElement($item)) {
            // set the owning side to null (unless already changed)
            if ($item->getItemCategory() === $this) {
                $item->setItemCategory(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, CategoryComment>
     */
    public function getCategoryComment(): Collection
    {
        return $this->categoryComment;
    }

    public function addCategoryComment(CategoryComment $categoryComment): self
    {
        if (!$this->categoryComment->contains($categoryComment)) {
            $this->categoryComment[] = $categoryComment;
            $categoryComment->setItemCategory($this);
        }

        return $this;
    }

    public function removeCategoryComment(CategoryComment $categoryComment): self
    {
        if ($this->categoryComment->removeElement($categoryComment)) {
            // set the owning side to null (unless already changed)
            if ($categoryComment->getItemCategory() === $this) {
                $categoryComment->setItemCategory(null);
            }
        }

        return $this;
    }
}
