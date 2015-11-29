<?php

namespace Thruster\Bundle\DoctrineActionsBundle;

use Doctrine\ORM\EntityManager;
use Doctrine\Bundle\DoctrineBundle\Registry;
use Thruster\Action\DoctrineActions\DoctrinePersistActionExecutor as BaseDoctrinePersistActionExecutor;

/**
 * Class DoctrinePersistActionExecutor
 *
 * @package Thruster\Bundle\DoctrineActionsBundle
 * @author  Aurimas Niekis <aurimas@niekis.lt>
 */
class DoctrinePersistActionExecutor extends BaseDoctrinePersistActionExecutor
{
    /**
     * @var Registry
     */
    protected $registry;

    /**
     * @param Registry $registry
     */
    public function __construct(Registry $registry)
    {
        $this->registry = $registry;
    }

    /**
     * @param string $name
     *
     * @return EntityManager
     */
    public function getEntityManagerByName(string $name) : EntityManager
    {
        return $this->registry->getManager($name);
    }

    /**
     * @inheritDoc
     */
    public function execute(array $arguments) : array
    {
        $entityManagerName = 'default';
        $firstArgument     = reset($arguments);

        if (is_string($firstArgument)) {
            $entityManagerName = array_shift($arguments);
        }

        $entityManager = $this->getEntityManagerByName($entityManagerName);

        foreach ($arguments as $argument) {
            $entityManager->persist($argument);
        }

        $entityManager->flush();

        return $arguments;
    }
}
