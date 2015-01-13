<?php
/*
 * This file is part of the prooph/ProophEventStoreModule.
 * (c) Alexander Miertsch <contact@prooph.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * 
 * Date: 05.09.14 - 22:12
 */

namespace ProophEventStoreModuleTest\Factory;
use ProophEventStoreModuleTest\Bootstrap;
use ProophEventStoreModuleTest\TestCase;

/**
 * Class AbstractRepositoryFactoryTest
 *
 * @package ProophEventStoreModuleTest\Factory
 * @author Alexander Miertsch <kontakt@codeliner.ws>
 */
class AbstractRepositoryFactoryTest extends TestCase
{
    /**
     * @test
     */
    public function it_constructs_a_repository_by_simple_map()
    {
        $repo = Bootstrap::getServiceManager()->get("repo_1");

        $this->assertInstanceOf('Prooph\EventStore\Aggregate\AggregateRepository', $repo);

        $this->assertAttributeInstanceOf('Prooph\EventStore\EventStore', 'eventStore', $repo);
        $this->assertAttributeInstanceOf('Prooph\EventStore\Aggregate\DefaultAggregateTranslator', 'aggregateTranslator', $repo);
        $this->assertAttributeInstanceOf('Prooph\EventStore\Stream\SingleStreamStrategy', 'streamStrategy', $repo);
    }

    /**
     * @test
     */
    public function it_constructs_repository_from_class_mapping_with_default_dependencies()
    {
        $repo = Bootstrap::getServiceManager()->get("repo_2");

        $this->assertInstanceOf('Prooph\EventStore\Aggregate\AggregateRepository', $repo);

        $this->assertAttributeInstanceOf('Prooph\EventStore\EventStore', 'eventStore', $repo);
        $this->assertAttributeInstanceOf('Prooph\EventStore\Aggregate\DefaultAggregateTranslator', 'aggregateTranslator', $repo);
        $this->assertAttributeInstanceOf('Prooph\EventStore\Stream\SingleStreamStrategy', 'streamStrategy', $repo);
    }

    /**
     * @test
     */
    public function it_constructs_repository_from_class_mapping_with_custom_dependencies()
    {
        $repo = Bootstrap::getServiceManager()->get("repo_3");

        $this->assertInstanceOf('Prooph\EventStore\Aggregate\AggregateRepository', $repo);

        $this->assertAttributeInstanceOf('Prooph\EventStore\EventStore', 'eventStore', $repo);
        $this->assertAttributeInstanceOf('ProophEventStoreModuleTest\Mock\CustomAggregateTranslator', 'aggregateTranslator', $repo);
        $this->assertAttributeInstanceOf('Prooph\EventStore\Stream\AggregateStreamStrategy', 'streamStrategy', $repo);
    }

    /**
     * @test
     */
    public function it_throws_exception_if_wrong_mapping_is_provided()
    {
        $this->setExpectedException('Zend\ServiceManager\Exception\ServiceNotCreatedException');
        Bootstrap::getServiceManager()->get("repo_4");
    }

    /**
     * @test
     */
    public function it_throws_exception_if_repository_class_is_missing()
    {
        $this->setExpectedException('Zend\ServiceManager\Exception\ServiceNotCreatedException');
        Bootstrap::getServiceManager()->get("repo_5");
    }


    /**
     * @test
     */
    public function it_throws_exception_if_aggregate_type_is_missing()
    {
        $this->setExpectedException('Zend\ServiceManager\Exception\ServiceNotCreatedException');
        Bootstrap::getServiceManager()->get("repo_6");
    }

    /**
     * @test
     */
    public function it_throws_exception_if_repository_class_can_not_be_found()
    {
        $this->setExpectedException('Zend\ServiceManager\Exception\ServiceNotCreatedException');
        Bootstrap::getServiceManager()->get("repo_7");
    }
}
 