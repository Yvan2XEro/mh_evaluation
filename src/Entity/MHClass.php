<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\MHClassRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=MHClassRepository::class)
 */
class MHClass
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=MHUser::class, mappedBy="studentClass")
     */
    private $students;

    /**
     * @ORM\OneToMany(targetEntity=MHExam::class, mappedBy="class")
     */
    private $mHExams;

    public function __construct()
    {
        $this->students = new ArrayCollection();
        $this->mHExams = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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
     * @return Collection|MHUser[]
     */
    public function getStudents(): Collection
    {
        return $this->students;
    }

    public function addStudent(MHUser $student): self
    {
        if (!$this->students->contains($student)) {
            $this->students[] = $student;
            $student->setStudentClass($this);
        }

        return $this;
    }

    public function removeStudent(MHUser $student): self
    {
        if ($this->students->removeElement($student)) {
            // set the owning side to null (unless already changed)
            if ($student->getStudentClass() === $this) {
                $student->setStudentClass(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|MHExam[]
     */
    public function getMHExams(): Collection
    {
        return $this->mHExams;
    }

    public function addMHExam(MHExam $mHExam): self
    {
        if (!$this->mHExams->contains($mHExam)) {
            $this->mHExams[] = $mHExam;
            $mHExam->setClass($this);
        }

        return $this;
    }

    public function removeMHExam(MHExam $mHExam): self
    {
        if ($this->mHExams->removeElement($mHExam)) {
            // set the owning side to null (unless already changed)
            if ($mHExam->getClass() === $this) {
                $mHExam->setClass(null);
            }
        }

        return $this;
    }
}
