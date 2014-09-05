<?php
/*
 * This file is part of the prooph/ProophEventStoreModule.
 * (c) Alexander Miertsch <contact@prooph.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * 
 * Date: 03.09.14 - 22:01
 */

namespace ProophEventStoreModule\Factory;

use Prooph\EventStore\Stream\AggregateStreamStrategy;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class AggregateStreamStrategyFactory implements FactoryInterface
{

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $aggregateTypeStreamMap = array();

        if ($serviceLocator->has('configuration')) {
            $config = $serviceLocator->get('configuration');

            if (isset($config['prooph.event_store']) && isset($config['prooph.event_store']['aggregate_type_stream_map'])) {
                $aggregateTypeStreamMap = $config['prooph.event_store']['aggregate_type_stream_map'];
            }
        }

        return new AggregateStreamStrategy($serviceLocator->get('prooph.event_store'), $aggregateTypeStreamMap);
    }
}
 