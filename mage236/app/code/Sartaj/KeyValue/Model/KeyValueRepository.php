<?php
/**
 * KeyVaue repository class.
 *
 * Created By : Sartaj
 */
namespace Sartaj\KeyValue\Model;

use Sartaj\KeyValue\Api\Data;
use Sartaj\KeyValue\Api\KeyValueRepositoryInterface;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Reflection\DataObjectProcessor;
use Sartaj\KeyValue\Model\ResourceModel\KeyValue as keyValueResource;
use Magento\Store\Model\StoreManagerInterface;


class KeyValueRepository implements \Sartaj\KeyValue\Api\KeyValueRepositoryInterface
{
    /**
     * @var $keyValueResource
     */
    protected $keyValueResource;

    /**
     * @var $dataObjectHelper
     */
    protected $dataObjectHelper;

    /**
     * @var $dataObjectProcessor
     */
    protected $dataObjectProcessor;

    /**
     * @var $keyValueCollectionFactory
     */
    protected $keyValueCollectionFactory;

    /**
     * @var $storeManager
     */
    private $storeManager;

    /**
     * @param keyValueResource $keyValueResource
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     */
    public function __construct(
        keyValueResource $keyValueResource,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager
    ) {
        $this->keyValueResource = $keyValueResource;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->storeManager = $storeManager;
    }

    /**
     * @method save
     * @param Data\KeyValueInterface $keyvalue
     * @return object
     */
    public function save(Data\KeyValueInterface $keyvalue): Data\KeyValueInterface
    {
        if ($keyvalue->getStoreId() === null) {
            $storeId = $this->storeManager->getStore()->getId();
            $keyvalue->setStoreId($storeId);
        }
        try {
            $this->keyValueResource->save($keyvalue);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(
                __('Could not save the news: %1', $exception->getMessage()),
                $exception
            );
        }
        return $keyvalue;
    }

    /**
     * @method getById
     * @param $entityId
     * @return object
     */
    public function getById($entityId)
    {
        $keyvalue = $this->allnewsFactory->create();
        $keyvalue->load($entityId);
        if (!$keyvalue->getId()) {
            throw new NoSuchEntityException(__('Data with id "%1" does not exist.', $entityId));
        }
        return $keyvalue;
    }

    /**
     * @method delete
     * @param Data\KeyValueInterface $keyvalue
     * @return boolean
     */
    public function delete(Data\KeyValueInterface $keyvalue)
    {
        try {
            $this->keyValueResource->delete($keyvalue);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the data: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * @method deleteById
     * @param $entityId
     * @return boolean
     */
    public function deleteById($entityId): bool
    {
        return $this->delete($this->getById($entityId));
    }
}