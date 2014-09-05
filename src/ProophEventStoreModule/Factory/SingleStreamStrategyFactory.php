<?php
/*
 * This file is part of the prooph/ProophEventStoreModule.
 * (c) Alexander Miertsch <contact@prooph.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * 
 * Date: 03.09.14 - 21:53
 */

namespace ProophEventStoreModule\Factory;

use Prooph\EventStore\Stream\SingleStreamStrategy;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class SingleStreamStrategyFactory implements FactoryInterface
{

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $singleStreamName = null;

        if ($serviceLocator->has('configuration')) {
            $config = $serviceLocator->get('configuration');

            if (isset($config['prooph.event_store']) && isset($config['prooph.event_store']['single_stream_name'])) {
                $singleStreamName = $config['prooph.event_store']['single_stream_name'];
            }
        }

        return new SingleStreamStrategy($serviceLocator->get('prooph.event_store'), $singleStreamName);
    }
}
 