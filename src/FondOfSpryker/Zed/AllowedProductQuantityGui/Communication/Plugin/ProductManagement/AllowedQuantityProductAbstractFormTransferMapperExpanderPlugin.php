<?php

namespace FondOfSpryker\Zed\AllowedProductQuantityGui\Communication\Plugin\ProductManagement;

use FondOfSpryker\Zed\AllowedProductQuantityGui\Communication\Form\AllowedQuantityForm;
use FondOfSpryker\Zed\ProductManagement\Dependency\Plugin\ProductAbstractFormTransferMapperExpanderPluginInterface;
use Generated\Shared\Transfer\AllowedProductQuantityTransfer;
use Generated\Shared\Transfer\ProductAbstractTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * @method \FondOfSpryker\Zed\AllowedProductQuantityGui\Communication\AllowedProductQuantityGuiCommunicationFactory getFactory()
 */
class AllowedQuantityProductAbstractFormTransferMapperExpanderPlugin extends AbstractPlugin implements ProductAbstractFormTransferMapperExpanderPluginInterface
{
    /**
     * Specification:
     * - Expands ProductAbstractTransfer with submitted data
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\ProductAbstractTransfer $productAbstractTransfer
     * @param array $formData
     *
     * @return \Generated\Shared\Transfer\ProductAbstractTransfer
     */
    public function map(ProductAbstractTransfer $productAbstractTransfer, array $formData): ProductAbstractTransfer
    {
        $allowedProductQuantityTransfer = $this->mapFormDataToTransfer($formData);

        return $productAbstractTransfer->setAllowedQuantity($allowedProductQuantityTransfer);
    }

    /**
     * @param array $formData
     *
     * @return \Generated\Shared\Transfer\AllowedProductQuantityTransfer|null
     */
    protected function mapFormDataToTransfer(array $formData): ?AllowedProductQuantityTransfer
    {
        if (!array_key_exists(AllowedQuantityForm::NAME, $formData)) {
            return null;
        }

        return (new AllowedProductQuantityTransfer())
            ->fromArray($formData[AllowedQuantityForm::NAME], true);
    }
}
