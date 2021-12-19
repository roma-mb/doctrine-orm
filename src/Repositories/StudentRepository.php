<?php

namespace DoctrineORM\Repositories;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;
use DoctrineORM\Entity\Student;

class StudentRepository extends EntityRepository
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $em, ClassMetadata $class)
    {
        parent::__construct($em, $class);

        $this->entityManager = $this->getEntityManager();
    }

    public function findCoursesByStudent(): ?array
    {
        $entityStudent = Student::class;

        $dql = "SELECT student, phones, courses 
                  FROM $entityStudent student 
                  JOIN student.phones phones 
                  JOIN student.courses courses";

        $query = $this->entityManager->createQuery($dql);

        return $query->getResult();
    }

    public function findCoursesByQueryBuilder(): ?array
    {
        $query = $this->createQueryBuilder('student')
            ->join('student.phones', 'phones')
            ->join('student.courses', 'courses')
            ->addSelect('phones')
            ->addSelect('courses')
            ->getQuery();

        return $query->getResult();
    }
}
