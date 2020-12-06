<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\MHResponseRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 * attributes={ }
 * )
 * @ORM\Entity(repositoryClass=MHResponseRepository::class)
 */
class MHResponse
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=MHQuestion::class, inversedBy="mHResponses")
     */
    private $question;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $content;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $note;

    /**
     * @ORM\ManyToOne(targetEntity=MHUser::class, inversedBy="mHResponses")
     */
    private $student;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuestion(): ?MHQuestion
    {
        return $this->question;
    }

    public function setQuestion(?MHQuestion $question): self
    {
        $this->question = $question;

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

    public function getNote(): ?float
    {
        return $this->note;
    }

    public function setNote(?float $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getStudent(): ?MHUser
    {
        return $this->student;
    }

    public function setStudent(?MHUser $student): self
    {
        $this->student = $student;

        return $this;
    }
}
