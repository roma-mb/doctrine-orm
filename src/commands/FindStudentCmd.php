<?php

require_once(__DIR__ . '/../../vendor/autoload.php');

use DoctrineORM\Entity\Phone;
use DoctrineORM\Entity\Student;
use DoctrineORM\Helper\EntityManagerFactory;

$manager       = new EntityManagerFactory();
$entityManager = $manager->getEntityManager();
$entityStudent = Student::class;
$repository    = $entityManager->getRepository($entityStudent);

/** @var Student[] $students */
$students = $repository->findAll();

foreach ($students as $student) {
    $phones = $student->getPhones()->map(static function (Phone $phone) {
        return $phone->getNumber();
    })->toArray();

    $formattedPhones = implode(', ', $phones);

    echo "_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _" . PHP_EOL;
    echo "| ID:     |{$student->getId()}" . PHP_EOL;
    echo "| Nome:   |{$student->getName()}" . PHP_EOL;
    echo "| Phones: |$formattedPhones" . PHP_EOL;
    echo "_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _" . PHP_EOL;
}

echo PHP_EOL;

echo 'Scalar Result: ' . PHP_EOL;
$dql   = "SELECT COUNT(student) FROM $entityStudent student";
$query = $entityManager->createQuery($dql);

echo "Total students: {$query->getSingleScalarResult()}" . PHP_EOL;

echo PHP_EOL;

$student     = $repository->find(1);
$studentName = $student->getName();

echo "Find Name: $studentName" . PHP_EOL;

echo PHP_EOL;

$student = $repository->findBy(['name' => $studentName]);
echo "FindBy Name: {$student[0]->getName()}" . PHP_EOL;

echo PHP_EOL;

$student = $repository->findOneBy(['name' => $studentName]);
echo "FindOneBy Name: {$student->getName()}" . PHP_EOL;
