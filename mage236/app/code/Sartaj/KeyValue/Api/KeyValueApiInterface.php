<?php
/**
 * Interface class for REST API
 *
 * Created By : Sartaj
 */
namespace Sartaj\KeyValue\Api;

interface KeyValueApiInterface
{
    /**
    * GET API
    * @return JSON
    */

    public function getAll();

    /**
    * GET by code API
    * @return JSON
    */

    public function getByCode(string $code);

    /**
    * DELETE API
    * @return JSON
    */

    public function deleteByCode(string $code);

    /**
    * POST API
    * @return JSON
    */
    public function addRecord();
}