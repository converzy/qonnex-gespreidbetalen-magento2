<?php
namespace Qonnex\GespreidBetalen\Model\Config\Source\Order\Status;
use Magento\Sales\Model\Order;
use Magento\Sales\Model\Config\Source\Order\Status;

/**
 * Order Status source model
 */
class Pending extends Status
{
    /**
     * @var string[]
     */
    protected $_stateStatuses = [Order::STATE_NEW];
}
