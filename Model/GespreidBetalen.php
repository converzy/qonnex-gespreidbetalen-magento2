<?php
namespace Qonnex\GespreidBetalen\Model;

/**
 * Pay In Store payment method model
 */
class GespreidBetalen extends \Magento\Payment\Model\Method\AbstractMethod
{
    /**
     * Payment code
     *
     * @var string
     */
    protected $_code = 'gespreidbetalen';

    /**
     * Availability option
     *
     * @var bool
     */
    protected $_isOffline = true;

    /**
     * Determine method availability based on quote amount and config data
     *
     * @param \Magento\Quote\Api\Data\CartInterface|null $quote
     * @return bool
     */
    public function isAvailable(\Magento\Quote\Api\Data\CartInterface $quote = null)
    {
        if ($quote && ($quote->getBaseGrandTotal() < $this->getConfigData('min_order_total'))) {
            return false;
        }
        return parent::isAvailable($quote);
    }
}
