<?php

require_once(__DIR__ . '/../../vendor/autoload.php');

use DoctrineORM\Entity\Phone;
use DoctrineORM\Entity\Student;
use DoctrineORM\Helper\EntityManagerFactory;

$manager       = new EntityManagerFactory();
$entityManager = $manager->getEntityManager();

$student = new Student();
$student->setName($argv[1]);

for ($i = 2; $i < $argc; $i++) {
    $phone = new Phone();
    $phone->setNumber($argv[$i]);

//    Use this or annotation, cascade={"remove", "persist"}
//    $entityManager->persist($phone);

    $student->addPhone($phone);
}

$entityManager->persist($student);
$entityManager->flush();
