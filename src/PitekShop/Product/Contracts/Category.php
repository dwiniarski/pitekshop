<?php


namespace PitekShop\Product\Contracts;


abstract class Category
{
    /**
     * Category unique ID
     * @var int $id
     */
    protected int $id;

    /**
     * Parent category. Null means that this is main category
     * @var Category $parentCategory
     */
    protected Category $parentCategory;

    /**
     * Category name
     * @var string $name
     */
    protected string $name;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return Category|null
     */
    public function getParentCategory(): ?Category
    {
        return $this->parentCategory;
    }

    /**
     * @param Category|null $parentCategory
     */
    public function setParentCategory(?Category $parentCategory): void
    {
        $this->parentCategory = $parentCategory;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

}