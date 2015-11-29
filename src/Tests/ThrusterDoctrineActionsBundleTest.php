<?php

namespace Thruster\Bundle\DoctrineActionsBundle\Tests;

use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;
use Thruster\Bundle\DoctrineActionsBundle\ThrusterDoctrineActionsBundle;

class ThrusterDoctrineActionsBundleTest extends \PHPUnit_Framework_TestCase
{
    public function testAddCompilerPass()
    {
        $builderMock = $this->getMock('\Symfony\Component\DependencyInjection\ContainerBuilder');

        $builderMock->expects($this->once())
            ->method('addCompilerPass')
            ->will(
                $this->returnCallback(
                    function ($compilerPass) use ($builderMock) {
                        $this->assertInstanceOf(
                            '\Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface',
                            $compilerPass
                        );

                        $compilerPass->process($builderMock);
                    }
                )
            );

        $builderMock->expects($this->once())
            ->method('setDefinition')
            ->will(
                $this->returnCallback(
                    function ($id, $definition) {
                        /** @var Definition $definition */
                        $this->assertSame('thruster_doctrine_actions.doctrine_persist_action.executor', $id);
                        $this->assertInstanceOf(
                            '\Symfony\Component\DependencyInjection\Definition',
                            $definition
                        );
                        $this->assertSame(
                            'Thruster\Bundle\DoctrineActionsBundle\DoctrinePersistActionExecutor',
                            $definition->getClass()
                        );

                        /** @var Reference $reference */
                        $reference = $definition->getArgument(0);

                        $this->assertSame('doctrine', (string) $reference);
                        $this->assertEquals(['thruster_action_executor' => [[]]], $definition->getTags());
                    }
                )
            );

        $bundle = new ThrusterDoctrineActionsBundle();
        $bundle->build($builderMock);
    }
}
