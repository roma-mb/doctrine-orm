<?php

require_once(__DIR__ . '/../../vendor/autoload.php');

use Doctrine\DBAL\Logging\DebugStack;
use DoctrineORM\Entity\Phone;
use DoctrineORM\Entity\Student;
use DoctrineORM\Helper\EntityManagerFactory;

$manager       = new EntityManagerFactory();
$entityManager = $manager->getEntityManager();
$repository    = $entityManager->getRepository(Student::class);

$debugStack = new DebugStack();
$entityManager->getConfiguration()->setSQLLogger($debugStack);

/** @var Student[] $students */
$students = $repository->findAll();

foreach ($students as $student) {
    $phones = $student->getPhones()->map(static function (Phone $phone) {
        return $phone->getNumber();
    })->toArray();

    $courses = $student->getCourses();

    echo "_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _" . PHP_EOL;
    echo "| ID:          |{$student->getId()}" . PHP_EOL;
    echo "| Nome:        |{$student->getName()}" . PHP_EOL;
    echo "| Phones:      |" . implode(', ', $phones) . PHP_EOL;

    foreach ($courses as $course) {
        echo "| Course ID:   |{$course->getId()}" . PHP_EOL;
        echo "| Course Name: |{$course->getName()}" . PHP_EOL;
        echo "_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _" . PHP_EOL;
    }
}

echo PHP_EOL;

var_dump($debugStack);
