<?php
/**
 * MassDelete controller class
 *
 * Created By : Sartaj
 */
namespace Sartaj\KeyValue\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\Redirect;
use Sartaj\KeyValue\Model\ResourceModel\KeyValue\CollectionFactory;
use Sartaj\KeyValue\Api\KeyValueRepositoryInterface;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Exception\NotFoundException;
use Magento\Ui\Component\MassAction\Filter;

class MassDelete extends Action implements HttpPostActionInterface
{
    /**
     * Authorization level
     */
    //const ADMIN_RESOURCE = 'Magento_Catalog::categories';

    /**
     * @var \Sartaj\KeyValue\Model\ResourceModel\KeyValue\CollectionFactory
     */
    protected $collectionFactory;

    /**
     * @var \Sartaj\KeyValue\Api\KeyValueRepositoryInterface
     */
    private $keyvalueRepositoryInterface;

    /**
     * @var \Magento\Ui\Component\MassAction\Filter
     */
    protected $filter;

    /**
     * Constructor
     *
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Ui\Component\MassAction\Filter $filter
     * @param \Sartaj\KeyValue\Model\ResourceModel\KeyValue\CollectionFactory $collectionFactory
     * @param \Sartaj\KeyValue\Api\KeyValueRepositoryInterface $keyvalueRepositoryInterface
     */
    public function __construct(
        Context $context,
        Filter $filter,
        CollectionFactory $collectionFactory,
        KeyValueRepositoryInterface $keyvalueRepositoryInterface
    ) {
        $this->filter = $filter;
        $this->collectionFactory = $collectionFactory;
        $this->keyvalueRepositoryInterface = $keyvalueRepositoryInterface;
        parent::__construct($context);
    }

    /**
     * KeyValue delete action
     *
     * @return Redirect
     */
    public function execute(): Redirect
    {
        if (!$this->getRequest()->isPost()) {
            throw new NotFoundException(__('Page not found'));
        }
        $collection = $this->filter->getCollection($this->collectionFactory->create());
        //die(count($collection->getItems()));

        $itemCount = 0;
        foreach ($collection->getItems() as $item) {
            $this->keyvalueRepositoryInterface->delete($item);
            $itemCount++;
        }

        if ($itemCount) {
            $this->messageManager->addSuccessMessage(
                __('A total of %1 record(s) have been deleted.', $itemCount)
            );
        }
        return $this->resultFactory->create(ResultFactory::TYPE_REDIRECT)->setPath('*/*/');
    }
}
