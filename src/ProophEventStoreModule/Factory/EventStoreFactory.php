<?php
/*
 * This file is part of the prooph/ProophEventStoreModule.
 * (c) Alexander Miertsch <contact@prooph.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * 
 * Date: 02.06.14 - 22:05
 */

namespace ProophEventStoreModule\Factory;

use Codeliner\ArrayReader\ArrayReader;
use Prooph\EventStore\Configuration\Configuration;
use Prooph\EventStore\Configuration\Exception\ConfigurationException;
use Prooph\EventStore\EventStore;
use Prooph\EventStore\Feature\FeatureManager;
use Zend\ServiceManager\Config;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class EventStoreFactory
 *
 * @package src\ProophEventStoreModule\Service
 * @author Alexander Miertsch <kontakt@codeliner.ws>
 */
class EventStoreFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @throws \Prooph\EventStore\Configuration\Exception\ConfigurationException
     * @return EventStore
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get("configuration");

        if (! isset($config['prooph.event_store'])) {
            throw ConfigurationException::configurationError("Missing key prooph.event_store in application configuration");
        }

        $config = $config['prooph.event_store'];

        if (! isset($config['adapter'])) {
            throw ConfigurationException::configurationError("Missing adapter configuration in prooph.event_store configuration");
        }

        $adapterConfig = $config['adapter'];

        $configReader = new ArrayReader($adapterConfig);

        $adapterType    = $configReader->stringValue("type");
        $adapterOptions = $configReader->arrayValue("options");

        if ( $adapterType == "zf2_adapter"
            && isset($adapterOptions['zend_db_adapter'])
            && is_string($adapterOptions['zend_db_adapter'])) {
            $config['adapter']['options']['zend_db_adapter'] = $serviceLocator->get($adapterOptions['zend_db_adapter']);
        }

        $featureManagerConfig = null;

        if (isset($config['feature_manager'])) {
            $featureManagerConfig = new Config($config['feature_manager']);
            unset($config['feature_manager']);
        }

        $esConfiguration = new Configuration($config);

        $featureManager = new FeatureManager($featureManagerConfig);

        $featureManager->setServiceLocator($serviceLocator);

        $esConfiguration->setFeatureManager($featureManager);

        return new EventStore($esConfiguration);
    }
}
 