<?php

namespace Thruster\Bundle\DoctrineActionsBundle\Tests;

use Thruster\Bundle\DoctrineActionsBundle\DoctrinePersistActionExecutor;

class DoctrinePersistActionExecutorTest extends \PHPUnit_Framework_TestCase
{
    public function testExecuteRegistryDefault()
    {
        $object = new \stdClass();

        $em = $this->getMockBuilder('\Doctrine\ORM\EntityManager')
            ->disableOriginalConstructor()
            ->getMock();

        $em->expects($this->once())
            ->method('persist')
            ->with($object);

        $em->expects($this->once())
            ->method('flush');

        $registry = $this->getMockBuilder('\Doctrine\Bundle\DoctrineBundle\Registry')
            ->disableOriginalConstructor()
            ->getMock();

        $registry->expects($this->once())
            ->method('getManager')
            ->with('default')
            ->willReturn($em);

        $executor = new DoctrinePersistActionExecutor($registry);
        $executor->execute([$object]);
    }

    public function testExecuteRegistryCustomManager()
    {
        $object = new \stdClass();

        $em = $this->getMockBuilder('\Doctrine\ORM\EntityManager')
            ->disableOriginalConstructor()
            ->getMock();

        $em->expects($this->once())
            ->method('persist')
            ->with($object);

        $em->expects($this->once())
            ->method('flush');

        $registry = $this->getMockBuilder('\Doctrine\Bundle\DoctrineBundle\Registry')
            ->disableOriginalConstructor()
            ->getMock();

        $registry->expects($this->once())
            ->method('getManager')
            ->with('custom')
            ->willReturn($em);

        $executor = new DoctrinePersistActionExecutor($registry);
        $executor->execute(['custom', $object]);
    }
}
