<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\MHUserRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=MHUserRepository::class)
 *  @ApiResource(attributes={ "order": {"firstName": "asc"}},
 *  normalizationContext={"groups"={"MHUser_read"}},
 *  denormalizationContext={"groups"={"MHUser_write"}},
 *  collectionOperations={
 *      "post"={},"get"={},
 *      "get_teachers"={
 *          "method"="GET",
 *          "path"="/teachers",
 *          "controller"=App\Controller\MHGetTeacherController::class
 *      },
 *      "get_students"={
 *          "method"="GET",
 *          "path"="/students",
 *          "controller"=App\Controller\MHGetStudentController::class
 *      }
 * }
 * )
 
 * @UniqueEntity("email")
 */
class MHUser implements UserInterface
{
    public const ROLE_STUDENT = "ROLE_STUDENT";

    public const ROLE_ADMIN = "ROLE_ADMIN";
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"MHUser_read", "MHUser_write"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"MHUser_read", "MHUser_write"})
     * @Assert\NotBlank
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"MHUser_read", "MHUser_write"})
     * @Assert\NotBlank
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=MHResponse::class, mappedBy="student")
     * @Groups("MHUser_write")
     */
    private $mHResponses;


    /**
     * @ORM\Column(type="string", length=180, unique=true)
     * @Groups({"MHUser_read", "MHUser_write"})
     * @Assert\NotBlank
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     * @Groups({"MHUser_read", "MHUser_write"})
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     * @Groups({"MHUser_read", "MHUser_write"})
     * @Assert\NotBlank
     */
    private $password;

    /**
     * @ORM\ManyToOne(targetEntity=MHClass::class, inversedBy="students")
     */
    private $studentClass;

    /**
     * @ORM\OneToMany(targetEntity=MHExam::class, mappedBy="author")
     */
    private $mHExams;

    public function __construct()
    {
        $this->mHResponses = new ArrayCollection();
        $this->mHExams = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

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
            $mHResponse->setStudent($this);
        }

        return $this;
    }

    public function removeMHResponse(MHResponse $mHResponse): self
    {
        if ($this->mHResponses->removeElement($mHResponse)) {
            // set the owning side to null (unless already changed)
            if ($mHResponse->getStudent() === $this) {
                $mHResponse->setStudent(null);
            }
        }

        return $this;
    }

    public function getStudentClass(): ?MHClass
    {
        return $this->studentClass;
    }

    public function setStudentClass(?MHClass $studentClass): self
    {
        $this->studentClass = $studentClass;

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
            $mHExam->setAuthor($this);
        }

        return $this;
    }

    public function removeMHExam(MHExam $mHExam): self
    {
        if ($this->mHExams->removeElement($mHExam)) {
            // set the owning side to null (unless already changed)
            if ($mHExam->getAuthor() === $this) {
                $mHExam->setAuthor(null);
            }
        }

        return $this;
    }
}
