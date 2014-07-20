<?php
/*
 * This file is part of the prooph/ProophEventStoreModule.
 * (c) Alexander Miertsch <contact@prooph.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * 
 * Date: 20.07.14 - 15:46
 */

namespace ProophEventStoreModuleTest\Factory;

use ProophEventStoreModule\Factory\EventStoreFactory;
use ProophEventStoreModuleTest\Bootstrap;
use ProophEventStoreModuleTest\TestCase;

/**
 * Class EventStoreFactoryTest
 *
 * @package ProophEventStoreModuleTest\Factory
 * @author Alexander Miertsch <kontakt@codeliner.ws>
 */
class EventStoreFactoryTest extends TestCase
{
    /**
     * @test
     */
    public function it_constructs_an_event_store()
    {
        $factory = new EventStoreFactory();

        $eventStore = $factory->createService(Bootstrap::getServiceManager());

        $this->assertInstanceOf('Prooph\EventStore\EventStore', $eventStore);
    }
}
 