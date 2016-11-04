<?php
namespace Qonnex\GespreidBetalen\Block;
use \Magento\Framework\App\Config\ScopeConfigInterface as Config;

class Pay extends \Magento\Framework\View\Element\Template
{
    /**
     * @var Config
     */
    protected $_scopeConfig;

    /**
     * @var \Magento\Checkout\Model\Session
     */
    protected $session;

    /**
     * @var UrlInterface
     */
    protected $urlBuilder;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Checkout\Model\Session $session,
        \Magento\Framework\UrlInterface $urlBuilder,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->_scopeConfig = $scopeConfig;
        $this->session      = $session;
        $this->urlBuilder   = $urlBuilder;
    }

    /**
     * @return $this
     */
    public function _prepareLayout()
    {
        return parent::_prepareLayout();
    }

    /**
     * @return array
     */
    public function getPayData()
    {
        $configData = $this->_scopeConfig->getValue(
            'payment/gespreidbetalen',
            'default'
        );
        $order = $this->session->getLastRealOrder();
        return array(
            'mo_inl_dlr'     => $configData['dealer_idnummer'],
            'mo_inl_plc'     => $configData['finan_formulier_code'],
            'mo_inl_csu'     => $this->urlBuilder->getUrl('checkout/onepage/success/'), //Todo::check ssl
            'mo_inl_amt'     => number_format ( $order->getGrandTotal(), 2, ".", ""),
        );
    }

    /**
     * @return bool
     */
    public function isGespreidBetalen()
    {
        $method = $this->session->getLastRealOrder()->getPayment()->getMethod();
        return ($method == 'gespreidbetalen') ? true : false;
    }

    /**
     * @return mixed
     */
    public function getSuccessMessage()
    {
        return $this->_scopeConfig->getValue(
            'payment/gespreidbetalen/success_text',
            'default'
        );
    }
}