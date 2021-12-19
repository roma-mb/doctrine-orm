<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use DoctrineORM\Helper\EntityManagerFactory;

require_once(__DIR__ . '/vendor/autoload.php');

$entityManager = (new EntityManagerFactory())->getEntityManager();

return ConsoleRunner::createHelperSet($entityManager);
