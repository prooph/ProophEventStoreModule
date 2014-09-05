<?php
/*
 * This file is part of the prooph/ProophEventStoreModule.
 * (c) Alexander Miertsch <contact@prooph.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * 
 * Date: 02.06.14 - 22:49
 */

/**
 * Start of ProophEventStore Feature Configuration
 */
$features = array(
    'feature_mock' => array(
        //Point to the Zend\ServiceManager\FactoryInterface FeatureFactory or
        //if the Feature is invokable point to the Feature itself
        'class' => 'ProophEventStoreModuleTest\Mock\FeatureMockFactory',
        //Set this to true, if class points to a factory
        'is_factory' => true
    ),
);

$settings = array(
    'single_stream_name' => 'my_event_stream',
    'aggregate_type_stream_map' => array(
        'My\Aggregate' => 'my_aggregate_stream'
    ),
    'repository_map' => array(
        //Test simple mapping
        'repo_1' => 'Prooph\EventStore\Aggregate\AggregateRepository',
        //Test repo with defaults
        'repo_2' => array(
            'repository_class' => 'Prooph\EventStore\Aggregate\AggregateRepository',
        ),
        //Test repo with custom dependencies
        'repo_3' => array(
            'repository_class' => 'Prooph\EventStore\Aggregate\AggregateRepository',
            'aggregate_translator' => 'custom_translator',
            'stream_strategy' => 'prooph.event_store.aggregate_stream_strategy',
        ),
        //Test wrong mapping
        'repo_4' => false,
        //Test missing repo class
        'repo_5' => array(
            'stream_strategy' => 'prooph.event_store.aggregate_stream_strategy',
        ),
        //Test repo class does not exist
        'repo_6' => array(
            'repository_class' => 'Not\Existing\Repo'
        ),
    ),
);

/* DO NOT EDIT BELOW THIS LINE */

$featureAliases = array();
$featureManagerConfig = array();

foreach ($features as $featureAlias => $config) {
    $featureAliases[] = $featureAlias;

    $managerConfigKey = (isset($config['is_factory']) && $config['is_factory'])? 'factories' : 'invokables';

    if (! isset($featureManagerConfig[$managerConfigKey])) {
        $featureManagerConfig[$managerConfigKey] = array();
    }

    if (! isset($config['class'])) {
        throw \Prooph\EventStore\Configuration\Exception\ConfigurationException::configurationError(
            sprintf(
                "Missing class definition in prooph.event_store feature configuration of feature %s",
                $featureAlias
            )
        );
    }

    $featureManagerConfig[$managerConfigKey][$featureAlias] = $config['class'];
}

return array(
    'service_manager' => array(
        'invokables' => array(
            'custom_translator' => 'ProophEventStoreModuleTest\Mock\CustomAggregateTranslator',
        ),
    ),
    'prooph.event_store' => array_merge(array(
        'features' => $featureAliases,
        'feature_manager' => $featureManagerConfig,
    ), $settings)
);
