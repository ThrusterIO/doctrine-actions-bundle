<?php

namespace Thruster\Bundle\DoctrineActionsBundle;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class ThrusterDoctrineActionsBundle
 *
 * @package Thruster\Bundle\DoctrineActionsBundle
 * @author  Aurimas Niekis <aurimas@niekis.lt>
 */
class ThrusterDoctrineActionsBundle extends Bundle
{
    /**
     * @inheritDoc
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(
            new class implements CompilerPassInterface
            {
                /**
                 * @inheritDoc
                 */
                public function process(ContainerBuilder $container)
                {
                    $executorId         = 'thruster_doctrine_actions.doctrine_persist_action.executor';
                    $executorDefinition = new Definition(
                        'Thruster\Bundle\DoctrineActionsBundle\DoctrinePersistActionExecutor',
                        [new Reference('doctrine')]
                    );

                    $executorDefinition->addTag('thruster_action_executor', []);

                    $container->setDefinition($executorId, $executorDefinition);
                }
            }
        );
    }
}
