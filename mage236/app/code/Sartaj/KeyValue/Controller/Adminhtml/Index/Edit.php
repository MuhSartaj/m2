<?php
/**
 * Edit controller page
 *
 * Created By : Sartaj
 */

namespace Sartaj\KeyValue\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Backend\Model\View\Result\Page;
use Magento\Framework\Controller\ResultFactory;

class Edit extends \Magento\Backend\App\Action {

    /**
     * @var ResultFactory
     */
    private $resultPageFactory;

    /**
     * @param Context $context
     * @param ResultFactory $resultPageFactory
     */
    
    public function __construct(Action\Context $context, ResultFactory $resultPageFactory)
    {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }
	/**
	 * @return Page
	 */
	public function execute() {
		$resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
		$resultPage->getConfig()->getTitle()->prepend(__('Edit Record'));
		return $resultPage;
	}
}