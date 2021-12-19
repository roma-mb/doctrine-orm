<?php

require_once(__DIR__ . '/../../vendor/autoload.php');

use DoctrineORM\Entity\Student;
use DoctrineORM\Helper\EntityManagerFactory;

$manager       = new EntityManagerFactory();
$entityManager = $manager->getEntityManager();

[$file, $id] = $argv;

$student = $entityManager->getReference(Student::class, $id);

$entityManager->remove($student);
$entityManager->flush();
