<?php

namespace App\Entity;

use App\Repository\CategoryCommentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoryCommentRepository::class)
 */
class CategoryComment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $item_category_id;

    /**
     * @ORM\Column(type="string", length=128)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=512)
     */
    private $text;

    /**
     *@var ItemCategory
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\ItemCategory", inversedBy="item_category")
     */
    private $itemCategory;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getItemCategoryId(): ?int
    {
        return $this->item_category_id;
    }

    public function setItemCategoryId(int $item_category_id): self
    {
        $this->item_category_id = $item_category_id;

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

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

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
