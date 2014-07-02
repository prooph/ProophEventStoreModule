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
 * ProophEventStore Adapter Configuration
 *
 * If you have a ./config/autoload/ directory set up for your project, you can
 * drop this config file in it and change the values as you wish.
 *
 * Please make sure that you do not commit this file to your CVS cause it contains sensitive data.
 */
$adapter = array(
    /**
     * Adapter Type
     *
     * Specify the adapter that ProophEventStore should use to persist events
     *
     * Default value: zf2_adapter
     *
     * Available adapters: zend_db_table (more coming soon ...)
     */
    'type' => 'zf2_adapter',    
    /**
     * Adapter options
     *
     * Specify configuration options for the adapter.
     * If you want to set up an own persistence adapter for the EventStore than pass the connection params to the underlying
     * adapter with the help of the options key. The structure of the options array depends on the used adapter type.
     *
     * Default value: SQLite in memory connection config for Zend\Db\Adapter\Adapter.
     *
     * Note: In most cases the default config is only useful for UnitTesting,
     */
    'options' => array(	
        'connection' => array(
            'driver' => 'Pdo_Sqlite',
            'database' => ':memory:'
        ),
	//It's also possible to specify an DI alias for Zend\Db\Adapter\Adapter instead of configure a connection, which creates a specific Db-Adapter for the EventStore
	//'zend_db_adapter' => 'Zend\Db\Adapter\Adapter',
    ),
    /**
     * End of ProophEventStore Adapter Configuration
     */
);


return array(
    'prooph.event_store' => array(
        'adapter' => $adapter
    )
);
