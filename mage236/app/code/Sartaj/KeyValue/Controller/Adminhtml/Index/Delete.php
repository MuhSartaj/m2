<?php
/**
 * Delete controller class
 *
 * Created By : Sartaj
 */
namespace Sartaj\KeyValue\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\Redirect;

class Delete extends Action
{

    /**
     * @var Sartaj\KeyValue\Model\Blog
     */
    protected $keyValue;

    /**
     * @param Context $context
     * @param \Sartaj\KeyValue\Model\KeyValue $keyValueFactory
     */
    public function __construct(
        Context $context,
        \Sartaj\KeyValue\Model\KeyValueFactory $keyValueFactory
    ) {
        parent::__construct($context);
        $this->keyValue = $keyValueFactory;
    }

    /**
     * {@inheritdoc}
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Sartaj_KeyValue::index_delete');
    }

    /**
     * Delete action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('entity_id');
        /** @var Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($id) {
            try {
                $model = $this->keyValue->create();
                $model->load($id);
                /*echo 'ID: '.$model->getId();
                die();*/
                $model->delete();
                $this->messageManager->addSuccess(__('Record deleted successfully.'));
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
                return $resultRedirect->setPath('*/*/edit', ['id' => $id]);
            }
        }
        $this->messageManager->addError(__('Record does not exist.'));
        return $resultRedirect->setPath('*/*/');
    }
}