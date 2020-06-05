<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OptionValueRepository")
 */
class OptionValue
{
    /**
     * @var int
     *
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var Option
     *
     * @ORM\ManyToOne(targetEntity="Option", inversedBy="optionValues")
     * @ORM\JoinColumn(name="optionId", referencedColumnName="id", nullable=false)
     */
    private $option;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="string", length=100, nullable=false)
     */
    private $value;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return $this
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return Option
     */
    public function getOption(): Option
    {
        return $this->option;
    }

    /**
     * @param Option $option
     * @return OptionValue
     */
    public function setOption(Option $option): OptionValue
    {
        $this->option = $option;

        return $this;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     * @return OptionValue
     */
    public function setValue(string $value): OptionValue
    {
        $this->value = $value;

        return $this;
    }
}
