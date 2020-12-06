<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\MHExamRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=MHExamRepository::class)
 */
class MHExam
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $session;

    /**
     * @ORM\Column(type="datetime")
     */
    private $beginAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $endAt;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\ManyToOne(targetEntity=MHUser::class, inversedBy="mHExams")
     */
    private $author;

    /**
     * @ORM\ManyToOne(targetEntity=MHClass::class, inversedBy="mHExams")
     */
    private $class;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSession(): ?\DateTimeInterface
    {
        return $this->session;
    }

    public function setSession(\DateTimeInterface $session): self
    {
        $this->session = $session;

        return $this;
    }

    public function getBeginAt(): ?\DateTimeInterface
    {
        return $this->beginAt;
    }

    public function setBeginAt(\DateTimeInterface $beginAt): self
    {
        $this->beginAt = $beginAt;

        return $this;
    }

    public function getEndAt(): ?\DateTimeInterface
    {
        return $this->endAt;
    }

    public function setEndAt(\DateTimeInterface $endAt): self
    {
        $this->endAt = $endAt;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getAuthor(): ?MHUser
    {
        return $this->author;
    }

    public function setAuthor(?MHUser $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getClass(): ?MHClass
    {
        return $this->class;
    }

    public function setClass(?MHClass $class): self
    {
        $this->class = $class;

        return $this;
    }
}
