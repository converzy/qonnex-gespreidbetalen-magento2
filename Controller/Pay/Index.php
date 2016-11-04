<?php
namespace Qonnex\GespreidBetalen\Controller\Pay;
class Index extends \Magento\Framework\App\Action\Action {

    /** @var  \Magento\Framework\View\Result\Page */
    protected $resultPageFactory;

    /**      * @param \Magento\Framework\App\Action\Context $context      */
    public function __construct(\Magento\Framework\App\Action\Context $context,
                                \Magento\Framework\View\Result\PageFactory $resultPageFactory)     {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    /**
     *
     * @return \Magento\Framework\View\Result\PageFactory
     */
    public function execute()
    {
        return $this->resultPageFactory->create();
    }
}