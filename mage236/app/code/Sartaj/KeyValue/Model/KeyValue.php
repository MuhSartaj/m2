<?php
/**
 * KeyValue Model class
 *
 * Created By : Sartaj
 */
declare(strict_types=1);

namespace Sartaj\KeyValue\Model;

use phpseclib\System\SSH\Agent\Identity;
use Sartaj\KeyValue\Api\Data\KeyValueInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Model\AbstractModel;
use Sartaj\KeyValue\Model\ResourceModel\KeyValue as KeyValueResourceModel;

class KeyValue extends AbstractModel implements KeyValueInterface, IdentityInterface
{
    const CACHE_TAG = 'keyvalue_tbl';

    //Unique identifier for use within caching
    protected $_cacheTag = self::CACHE_TAG;

    /**
     * Init resource model and id field
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(KeyValueResourceModel::class);
    }

    public function getIdentities(): array
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues(): array
    {
        return [];
    }

    /**
     * Get id
     *
     * @return int|null
     */
    public function getId()
    {
        return parent::getData(self::ENTITY_ID);
    }

    /**
     * Get Code
     *
     * @return string|null
     */
    public function getCode()
    {
        return $this->getData(self::CODE);
    }

    /**
     * Get Value
     *
     * @return string|null
     */
    public function getValue()
    {
        return $this->getData(self::VALUE);
    }

    /**
     * Get CreatedAt
     *
     * @return string|null
     */
    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * Set ID
     *
     * @param int $id
     * @return KeyValue
     */
    public function setId($id)
    {
        return $this->setData(self::ENTITY_ID, $id);
    }

    /**
     * Set code
     *
     * @param string code
     * @return \Sartaj\KeyValue\Api\Data\KeyValueInterface
     */
    public function setCode($code)
    {
        return $this->setData(self::CODE, $code);
    }

    /**
     * Set value
     *
     * @param string value
     * @return \Sartaj\KeyValue\Api\Data\KeyValueInterface
     */
    public function setValue($value)
    {
        return $this->setData(self::VALUE, $value);
    }

    /**
     * Set created_at
     *
     * @param string created_at
     * @return \Sartaj\KeyValue\Api\Data\KeyValueInterface
     */
    public function setCreatedAt($created_at)
    {
        return $this->setData(self::CREATED_AT, $created_at);
    }
}
