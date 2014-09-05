<?php
/*
 * This file is part of the prooph/ProophEventStoreModule.
 * (c) Alexander Miertsch <contact@prooph.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * 
 * Date: 02.06.14 - 22:02
 */

namespace ProophEventStoreModule;

/**
 * Class Module
 *
 * @package src\ProophEventStoreModule
 * @author Alexander Miertsch <kontakt@codeliner.ws>
 */
class Module 
{
    public function getConfig()
    {
        return include __DIR__ . '/../../config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__,
                ),
            ),
        );
    }


    public function getServiceConfig()
    {
        return array(
            'invokables' => array(
                'prooph.event_store.default_aggregate_translator' => 'Prooph\EventStore\Aggregate\DefaultAggregateTranslator',
            ),
            'aliases' => array(
                'prooph.event_store.default_stream_strategy' => 'prooph.event_store.single_stream_strategy',
            ),
            'factories' => array(
                'prooph.event_store' => 'ProophEventStoreModule\Factory\EventStoreFactory',
                'prooph.event_store.aggregate_stream_strategy' => 'ProophEventStoreModule\Factory\AggregateStreamStrategyFactory',
                'prooph.event_store.aggregate_type_stream_strategy' => 'ProophEventStoreModule\Factory\AggregateTypeStreamStrategyFactory',
                'prooph.event_store.single_stream_strategy' => 'ProophEventStoreModule\Factory\SingleStreamStrategyFactory',
            ),
            'abstract_factories' => array(
                'ProophEventStoreModule\Factory\AbstractRepositoryFactory'
            )
        );
    }
}
 