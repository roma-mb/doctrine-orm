<?php

require_once(__DIR__ . '/../../vendor/autoload.php');

use DoctrineORM\Entity\Course;
use DoctrineORM\Entity\Student;
use DoctrineORM\Helper\EntityManagerFactory;

$manager       = new EntityManagerFactory();
$entityManager = $manager->getEntityManager();

[$className, $studentId, $courseId] = $argv;

/** @var Student $student */
$student = $entityManager->find(Student::class, $studentId);

/** @var Course $course */
$course = $entityManager->find(Course::class, $courseId);

$student->addCourses($course);

$entityManager->flush();
