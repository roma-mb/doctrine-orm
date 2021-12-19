<?php

namespace DoctrineORM\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="phone")
 */
class Phone
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    public int $id;

    /**
     * @ORM\Column(type="string")
     */
    public string $number;

    /**
     * @ORM\ManyToOne(targetEntity="Student")
     * @ORM\JoinColumn(name="student_id", referencedColumnName="id")
     */
    public Student $student;

    public function getId(): int
    {
        return $this->id;
    }

    public function getNumber(): string
    {
        return $this->number;
    }

    public function setNumber(string $number): void
    {
        $this->number = $number;
    }

    public function getStudent(): Student
    {
        return $this->student;
    }

    public function setStudent(Student $student): Phone
    {
        $this->student = $student;

        return $this;
    }
}
