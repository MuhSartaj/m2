<?php
/**
 * Collection class
 *
 * Created By : Sartaj
 */
namespace Sartaj\KeyValue\Model\ResourceModel\KeyValue;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Sartaj\KeyValue\Model\KeyValue as KeyValueModel;
use Sartaj\KeyValue\Model\ResourceModel\KeyValue as KeyValueResourceModel;

class Collection extends AbstractCollection
{
	/**
     * @var string
     */
    protected $_idFieldName = 'entity_id';

    protected function _construct()
    {
        $this->_init(KeyValueModel::class, KeyValueResourceModel::class);
    }
}