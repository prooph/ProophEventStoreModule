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
    /**
     * You can add custom features to the EventStore by providing information of how the feature
     * can be initialized by the Prooph\EventStore\Feature\FeatureManager
     */
    /*
    'my.feature.alias' => array(
        //Point to the Zend\ServiceManager\FactoryInterface FeatureFactory or
        //if the Feature is invokable point to the Feature itself
        'class' => 'My\FeatureOrFactory',
        //Set this to true, if class points to a factory
        'is_factory' => false
    ),
    */
    /**
     * End of ProophEventStore Feature Configuration
     */
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
    'prooph.event_store' => array(
        'features' => $featureAliases,
        'feature_manager' => $featureManagerConfig,
    )
);
