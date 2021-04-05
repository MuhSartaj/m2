<?php
/**
 * RepositoryInterface class.
 *
 * Created By : Sartaj
 */
namespace Sartaj\KeyValue\Api;

use Sartaj\KeyValue\Api\Data;

interface KeyValueRepositoryInterface
{
	/*
	 * save method
	 * @param Data\KeyValueInterface $keyvalue
	 */
    public function save(Data\KeyValueInterface $keyvalue);

    /*
	 * getById method
	 * @param $entityId
	 */
    public function getById($entityId);

    /*
	 * delete method
	 * @param Data\KeyValueInterface $keyvalue
	 */
    public function delete(Data\KeyValueInterface $keyvalue);

    /*
	 * deleteById method
	 * @param $entityId
	 */
    public function deleteById($entityId);
}