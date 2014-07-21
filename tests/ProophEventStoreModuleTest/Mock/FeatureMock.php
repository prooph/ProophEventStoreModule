<?php
/*
 * This file is part of the prooph/ProophEventStoreModule.
 * (c) Alexander Miertsch <contact@prooph.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * 
 * Date: 21.07.14 - 18:57
 */

namespace ProophEventStoreModuleTest\Mock;

use Prooph\EventStore\EventStore;
use Prooph\EventStore\Feature\FeatureInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class FeatureMock
 *
 * @package ProophEventStoreModuleTest\Mock
 * @author Alexander Miertsch <kontakt@codeliner.ws>
 */
class FeatureMock implements FeatureInterface
{
    private static $invoked = false;

    private static $mainServiceLocator;

    public static function reset()
    {
        self::$invoked = false;
        self::$mainServiceLocator = null;
    }

    public function __construct(ServiceLocatorInterface $serviceLocator)
    {
        self::$mainServiceLocator = $serviceLocator;
    }

    /**
     * @param EventStore $eventStore
     * @return void
     */
    public function setUp(EventStore $eventStore)
    {
        self::$invoked = true;
    }

    /**
     * @return bool
     */
    public static function isInvoked()
    {
        return self::$invoked;
    }

    /**
     * @return ServiceLocatorInterface
     */
    public static function getMainServiceLocator()
    {
        return self::$mainServiceLocator;
    }
}
 