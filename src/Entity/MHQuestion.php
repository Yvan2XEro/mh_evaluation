<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\MHQuestionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=MHQuestionRepository::class)
 */
class MHQuestion
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
    private $baginAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $endAt;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=MHResponse::class, mappedBy="question")
     */
    private $mHResponses;

    public function __construct()
    {
        $this->mHResponses = new ArrayCollection();
    }

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

    public function getBaginAt(): ?\DateTimeInterface
    {
        return $this->baginAt;
    }

    public function setBaginAt(\DateTimeInterface $baginAt): self
    {
        $this->baginAt = $baginAt;

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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|MHResponse[]
     */
    public function getMHResponses(): Collection
    {
        return $this->mHResponses;
    }

    public function addMHResponse(MHResponse $mHResponse): self
    {
        if (!$this->mHResponses->contains($mHResponse)) {
            $this->mHResponses[] = $mHResponse;
            $mHResponse->setQuestion($this);
        }

        return $this;
    }

    public function removeMHResponse(MHResponse $mHResponse): self
    {
        if ($this->mHResponses->removeElement($mHResponse)) {
            // set the owning side to null (unless already changed)
            if ($mHResponse->getQuestion() === $this) {
                $mHResponse->setQuestion(null);
            }
        }

        return $this;
    }
}
