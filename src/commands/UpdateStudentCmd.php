<?php

require_once(__DIR__ . '/../../vendor/autoload.php');

use DoctrineORM\Entity\Student;
use DoctrineORM\Helper\EntityManagerFactory;

$manager       = new EntityManagerFactory();
$entityManager = $manager->getEntityManager();

[$file, $id, $name] = $argv;

$student = $entityManager->find(Student::class, $id);
$student->setName($name);

$entityManager->flush();
