<?php

require_once(__DIR__ . '/../../vendor/autoload.php');

use DoctrineORM\Entity\Course;
use DoctrineORM\Helper\EntityManagerFactory;

$manager       = new EntityManagerFactory();
$entityManager = $manager->getEntityManager();

$course = new Course();
$course->setName($argv[1]);

$entityManager->persist($course);
$entityManager->flush();
