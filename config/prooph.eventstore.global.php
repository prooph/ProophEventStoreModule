<?php
/*
 * This file is part of the prooph/ProophEventStoreModule.
 * (c) Alexander Miertsch <contact@prooph.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * 
 * Date: 02.06.14 - 22:21
 */

/**
 * ProophEventStoreModule Configuration
 *
 * If you have a ./config/autoload/ directory set up for your project, you can
 * drop this config file in it and change the values as you wish.
 */
$settings = array(
    /**
     * EventStore\Adapter DI Alias
     *
     * Please specify the DI alias for the configured EventStore\Adapter
     *
     * default value: prooph.eventstore.adapter.zf2_sqlite_in_memory
     */
    //'adapter' => 'prooph.eventstore.adapter.zf2_sqlite_in_memory'
    /**
     * End of ProophEventStoreModule Configuration
     */
);

/**
 * You do not need to edit below this line
 */
return array(
    'prooph.eventstore' => $settings
);