<?php

namespace FondOfSpryker\Zed\AllowedProductQuantityGui;

use FondOfSpryker\Zed\AllowedProductQuantityGui\Dependency\Facade\AllowedProductQuantityGuiToAllowedProductQuantityFacadeBridge;
use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;

class AllowedProductQuantityGuiDependencyProvider extends AbstractBundleDependencyProvider
{
    public const FACADE_ALLOWED_PRODUCT_QUANTITY = 'FACADE_ALLOWED_PRODUCT_QUANTITY';

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideCommunicationLayerDependencies(Container $container): Container
    {
        $container = parent::provideCommunicationLayerDependencies($container);

        $container = $this->addAllowedProductQuantityFacade($container);

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addAllowedProductQuantityFacade(Container $container): Container
    {
        $container[static::FACADE_ALLOWED_PRODUCT_QUANTITY] = function (Container $container) {
            return new AllowedProductQuantityGuiToAllowedProductQuantityFacadeBridge(
                $container->getLocator()->allowedProductQuantity()->facade()
            );
        };

        return $container;
    }
}
