<?php

require_once(__DIR__ . '/../../vendor/autoload.php');

use DoctrineORM\Helper\EntityManagerFactory;

$manager = new EntityManagerFactory();
$manager->getEntityManager()->getConnection();
