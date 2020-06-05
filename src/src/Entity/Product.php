<?php

namespace App\Entity;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Product
{
    /**
     * @var int
     *
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(name="id", type="integer")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=60, nullable=false)
     */
    private $title;

    /**
     * @var float|null
     *
     * @ORM\Column(name="price", type="decimal", precision=18, scale=2, nullable=true)
     */
    private $price;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime", nullable=false)
     */
    private $createdAt;

    /**
     * @var Option[]|ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="OptionValue", fetch="LAZY")
     * @ORM\JoinTable(name="option_value_product",
     *      joinColumns={@ORM\JoinColumn(name="productId", unique=false, referencedColumnName="id", onDelete="CASCADE")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="optionValueId", unique=false, referencedColumnName="id", onDelete="CASCADE")}
     * )
     */
    private $optionValues;

    /**
     * Product constructor.
     */
    public function __construct()
    {
        $this->title = '';
        $this->price = 0.;
        $this->createdAt = new DateTime();
        $this->optionValues = new ArrayCollection();
    }

    /**
     * @param int $id
     * @return Product
     */
    public function setId(int $id): Product
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param string $title
     * @return Product
     */
    public function setTitle(string $title): Product
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param float|null $price
     * @return Product
     */
    public function setPrice(?float $price): Product
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getPrice(): ?float
    {
        return $this->price;
    }

    /**
     * @param DateTime $createdAt
     * @return Product
     */
    public function setCreatedAt(DateTime $createdAt): Product
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    /**
     * @return Option[]|ArrayCollection
     */
    public function getOptionValues()
    {
        return $this->optionValues;
    }

    /**
     * @param OptionValue[]|ArrayCollection $optionValues
     * @return Product
     */
    public function setOptions(ArrayCollection $optionValues): Product
    {
        $this->optionValues = $optionValues;

        return $this;
    }

    /**
     * @param OptionValue $optionValues
     * @return Product
     */
    public function addOption(OptionValue $optionValues): Product
    {
        if (!$this->optionValues->contains($optionValues)) {
            $this->optionValues->add($optionValues);
        }

        return $this;
    }
}
