<?php
/*
 * This file is part of the prooph/ProophEventStoreModule.
 * (c) Alexander Miertsch <contact@prooph.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * 
 * Date: 21.07.14 - 18:59
 */

namespace ProophEventStoreModuleTest\Mock;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class FeatureMockFactory
 *
 * @package ProophEventStoreModuleTest\Mock
 * @author Alexander Miertsch <kontakt@codeliner.ws>
 */
class FeatureMockFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new FeatureMock($serviceLocator->getServiceLocator());
    }
}
 