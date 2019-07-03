<?php

namespace FondOfSpryker\Zed\AllowedProductQuantityGui\Communication\Plugin\ProductManagementExtension;

use FondOfSpryker\Zed\ProductManagement\Dependency\Plugin\ProductAbstractFormTabsExpanderPluginInterface;
use Generated\Shared\Transfer\TabsViewTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * @method \FondOfSpryker\Zed\AllowedProductQuantityGui\Communication\AllowedProductQuantityGuiCommunicationFactory getFactory()
 */
class AllowedQuantityProductAbstractFormTabsExpanderPlugin extends AbstractPlugin implements ProductAbstractFormTabsExpanderPluginInterface
{
    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\TabsViewTransfer $tabsViewTransfer
     *
     * @return \Generated\Shared\Transfer\TabsViewTransfer
     */
    public function expand(TabsViewTransfer $tabsViewTransfer): TabsViewTransfer
    {
        return $this->getFactory()->createProductAbstractTabExpander()->expand($tabsViewTransfer);
    }
}
