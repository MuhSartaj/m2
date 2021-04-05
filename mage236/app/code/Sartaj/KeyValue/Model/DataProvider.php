<?php
/**
 * DataProvider model class
 *
 * Created By : Sartaj
 */
namespace Sartaj\KeyValue\Model;

use Sartaj\KeyValue\Model\ResourceModel\KeyValue\CollectionFactory;

class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{

    /**
     * @var array
     */
    protected $loadedData;

    /**
     * @param $name
     * @param $primaryFieldName
     * @param CollectionFactory $blogCollectionFactory
     * @param array $meta = []
     * @param array $data = []
     */

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $blogCollectionFactory,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $blogCollectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }


    /**
     * @return object
     */
    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }
        $items = $this->collection->getItems();
        foreach ($items as $item) {
            $this->loadedData[$item->getId()] = $item->getData();
        }
        return $this->loadedData;
    }
}