<?php
/*
 * This file is part of the prooph/ProophEventStoreModule.
 * (c) Alexander Miertsch <contact@prooph.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * 
 * Date: 03.09.14 - 22:27
 */

namespace ProophEventStoreModuleTest\Factory;

use ProophEventStoreModuleTest\Bootstrap;
use ProophEventStoreModuleTest\TestCase;

class SingleStreamFactoryTest extends TestCase
{
    /**
     * @test
     */
    public function it_constructs_a_single_stream_strategy()
    {
        $streamStrategy = Bootstrap::getServiceManager()->get('prooph.event_store.single_stream_strategy');

        $this->assertInstanceOf('Prooph\EventStore\Stream\SingleStreamStrategy', $streamStrategy);
        $this->assertAttributeEquals('my_event_stream', 'streamName', $streamStrategy);
    }
}
 