<?php
namespace Pawan\ProductAlertApi\Api;
use Exception;

/**
 * Interface ProductAlertManagementInterface
 * @api
 */
interface ProductAlertManagementInterface
{
    /**
     * Return true if product Added to Alert.
     *
     * @param int $customerId
     * @param int $productId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function addProductAlertStock($customerId, $productId);
    /**
     * Return true if product Added to Alert.
     *
     * @param int $customerId
     * @param int $productId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function deleteProductAlertStock($customerId, $productId);
}
