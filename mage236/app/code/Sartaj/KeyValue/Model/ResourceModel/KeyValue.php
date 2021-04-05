<?php
/**
 * KeyValue resource model class
 *
 * Created By : Sartaj
 */
namespace Sartaj\KeyValue\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class KeyValue extends AbstractDb
{
    /**
     * @var $_date
     */
    protected $_date;

    /**
     * @param \Magento\Framework\Model\ResourceModel\Db\Context $context
     * @param \Magento\Framework\Stdlib\DateTime\DateTime $date
     */
    
    public function __construct(
        \Magento\Framework\Model\ResourceModel\Db\Context $context,
        \Magento\Framework\Stdlib\DateTime\DateTime $date
    ) {
        parent::__construct($context);
        $this->_date = $date;
    }
    /**
     * Define main table
     */
    protected function _construct()
    {
        $this->_init('keyvalue_tbl', 'entity_id');
    }
}