<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OptionRepository")
 */
class Option
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
     * @ORM\Column(name="title", type="string", length=100, nullable=false, unique=true)
     */
    private $title;

    /**
     * @var OptionValue[]|ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="OptionValue", mappedBy="option", cascade={"persist", "remove"}, orphanRemoval=TRUE)
     */
    private $optionValues;

    public function __construct()
    {
        $this->optionValues = new ArrayCollection();
    }

    /**
     * @param int $id
     * @return Option
     */
    public function setId(int $id): Option
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
     * @return Option
     */
    public function setTitle(string $title): Option
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
     * @return OptionValue[]|ArrayCollection
     */
    public function getOptionValues(): array
    {
        return $this->optionValues;
    }

    /**
     * @param OptionValue[]|ArrayCollection $optionValues
     * @return Option
     */
    public function addOptionValues($optionValues): Option
    {
        if (!$this->optionValues->contains($optionValues)) {
            $this->optionValues->add($optionValues);
        }

        return $this;
    }

    /**
     * @param OptionValue[]|ArrayCollection $optionValues
     * @return Option
     */
    public function setOptionValues($optionValues): Option
    {
        $this->optionValues = $optionValues;

        return $this;
    }
}
