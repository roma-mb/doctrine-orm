<?php

namespace DoctrineORM\Helper;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\ORMException;
use Doctrine\ORM\Tools\Setup;

require_once "vendor/autoload.php";

class EntityManagerFactory
{
    /**
     * @return EntityManagerInterface
     * @throws ORMException
     * Map entity to database, with generator
     */
    public function getEntityManager(): EntityManagerInterface
    {
        $rootDir = __DIR__ . '/../../';

        //create config based in annotations
        $config = Setup::createAnnotationMetadataConfiguration(
            [$rootDir . 'src'],
            true,
            null,
            null,
            false
        );

//        return EntityManager::create([
//            'driver' => 'pdo_sqlite',
//            'path' => $rootDir . 'var/data/database.sqlite'
//        ], $config);

        return EntityManager::create([
            'driver'   => 'pdo_mysql',
            'user'     => 'root',
            'password' => 'root',
            'dbname'   => 'doctrine',
        ], $config);
    }
}
