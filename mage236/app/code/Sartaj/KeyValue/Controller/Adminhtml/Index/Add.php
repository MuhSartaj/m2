<?php
/**
 * Add record page controller
 *
 * Created By : Sartaj
 */
namespace Sartaj\KeyValue\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Framework\Controller\ResultFactory;

class Add extends \Magento\Backend\App\Action
{
    /*
     * Action\Context $context
     * ResultFactory $resultPageFactory
     */
    public function __construct(Action\Context $context, ResultFactory $resultPageFactory)
    {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    /**
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create(ResultFactory::TYPE_PAGE);
        $resultPage->getConfig()->getTitle()->prepend(__('Add New Record'));
        return $resultPage;
    }
}