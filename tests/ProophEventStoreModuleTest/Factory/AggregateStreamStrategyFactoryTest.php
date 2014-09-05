<?php
/*
 * This file is part of the prooph/ProophEventStoreModule.
 * (c) Alexander Miertsch <contact@prooph.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * 
 * Date: 03.09.14 - 22:06
 */

namespace ProophEventStoreModuleTest\Factory;

use ProophEventStoreModule\Factory\AggregateStreamStrategyFactory;
use ProophEventStoreModuleTest\Bootstrap;
use ProophEventStoreModuleTest\TestCase;

class AggregateStreamStrategyFactoryTest extends TestCase
{
    /**
     * @test
     */
    public function it_constructs_a_aggregate_stream_strategy()
    {
        $streamStrategy = Bootstrap::getServiceManager()->get('prooph.event_store.aggregate_stream_strategy');

        $this->assertInstanceOf('Prooph\EventStore\Stream\AggregateStreamStrategy', $streamStrategy);
        $this->assertAttributeEquals(array('My\Aggregate' => 'my_aggregate_stream'), 'aggregateTypeStreamMap', $streamStrategy);
    }
}
 