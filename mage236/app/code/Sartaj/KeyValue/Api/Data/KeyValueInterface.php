<?php
/**
 * Interface class for Model
 *
 * Created By : Sartaj
 */
namespace Sartaj\KeyValue\Api\Data;

interface KeyValueInterface
{
    const ENTITY_ID = 'entity_id';
    const CODE  = 'code';
    const VALUE = 'value';
    const CREATED_AT = 'created_at';

    /**
     * Get ID
     *
     * @return int|null
     */
    public function getId();

    /**
     * Get Code
     *
     * @return string|null
     */
    public function getCode();

    /**
     * Get Value
     *
     * @return string|null
     */
    public function getValue();

    /**
     * Get CreatedAt
     *
     * @return string|null
     */
    public function getCreatedAt();

    /**
     * Set ID
     *
     * @param int $id
     * @return KeyValueInterface
     */
    public function setId($id);

    /**
     * Set code
     *
     * @param string code
     * @return KeyValueInterface
     */
    public function setCode($code);

    /**
     * Set value
     *
     * @param string value
     * @return KeyValueInterface
     */
    public function setValue($value);

    /**
     * Set created_at
     *
     * @param string created_at
     * @return KeyValueInterface
     */
    public function setCreatedAt($created_at);
}
