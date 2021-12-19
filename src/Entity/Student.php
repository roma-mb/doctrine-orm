<?php

namespace DoctrineORM\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="DoctrineORM\Repositories\StudentRepository")
 * @ORM\Table(name="student")
 */
class Student
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string")
     */
    private string $name;

    /**
     * @ORM\OneToMany(targetEntity="Phone", mappedBy="student", cascade={"remove", "persist"}, fetch="EAGER")
     */
    private Collection $phones;

    /**
     * @ORM\ManyToMany (targetEntity="Course", mappedBy="students")
     */
    private Collection $courses;

    public function __construct()
    {
        $this->phones  = new ArrayCollection();
        $this->courses = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getPhones(): Collection
    {
        return $this->phones;
    }

    public function addPhone(Phone $phone): Student
    {
        $this->phones->add($phone);
        $phone->setStudent($this);

        return $this;
    }

    /**
     * @return Collection
     */
    public function getCourses(): Collection
    {
        return $this->courses;
    }

    public function addCourses(Course $course): Student
    {
        if ($this->courses->contains($course)) {
            return $this;
        }

        $this->courses->add($course);
        $course->addStudents($this);

        return $this;
    }
}
