<?php
/**
 * KeyValue API Model class
 *
 * Created By : Sartaj
 */
namespace Sartaj\KeyValue\Model\Api;

use Sartaj\KeyValue\Model\ResourceModel\KeyValue\CollectionFactory;
use Sartaj\KeyValue\Model\KeyValueFactory;
use Sartaj\KeyValue\Model\KeyValueRepository;
use Magento\Framework\Webapi\Rest\Request;

class KeyValue
{
    /**
     * $keyValueFactory
     */
    protected $keyValueFactory;

    /**
     * @param CollectionFactory $keyValueFactory
     * @param KeyValueFactory $keyValueModelFactory
     * @param KeyValueRepository $keyValueRepository
     * @param Request $request
     */
    public function __construct(
        CollectionFactory $keyValueFactory,
        KeyValueFactory $keyValueModelFactory,
        KeyValueRepository $keyValueRepository,
        Request $request
    )
    {
        $this->keyValueFactory = $keyValueFactory;
        $this->keyValueRepository = $keyValueRepository;
        $this->keyValueModelFactory = $keyValueModelFactory;
        $this->request = $request;
    }

    /**
     * @inheritDoc
     */
    public function getAll()
    {
        return json_encode(['status' => 200, 'result' => $this->getCollection()->getData()]);
    }

    /**
     * @inheritDoc
     */
    public function getByCode($code)
    {
    	//return $code;
    	$result = $this->getCollection($code)->getData();
        return json_encode(['status' => 200, 'result' => $result]);
    }

    /**
     * @inheritDoc
     */
    public function deleteByCode($code)
    {
    	$result = $this->getCollection($code)->getData();
    	if($result){
    		try{
    			$record = $this->keyValueModelFactory->create();
    			$record->load($result[0]['entity_id']);
    			$record->delete();
    			return json_encode(['status' => 200, 'result' => 'deleted successfully.']);
    		}
    		catch(Exception $ex){
    			return json_encode(['status' => 200, 'result' => $ex->getMessage()]);
    		}
    	}
    	return json_encode(['status' => 200, 'result' => 'code not found.']);
    }

    /**
     * @inheritDoc
     */
    public function addRecord()
    {
    	$post = $this->request->getBodyParams();
    	if($post == null){
    		return json_encode(['status' => 200, 'result' => 'invalid request']);
    	}
    	try{
    		$record = $this->keyValueModelFactory->create();
    		$record->setCode($post['code']);
    		$record->setValue($post['value']);
    		$this->keyValueRepository->save($record);
    		return json_encode(['status' => 200, 'result' => 'Data saved successfully']);
    	}
    	catch(Exception $ex){
			return json_encode(['status' => 200, 'result' => $ex->getMessage()]);
		}
        return ['status' => 200];
    }

    /**
     * @inheritDoc
     */
    protected function getCollection($code = null)
    {
    	try{
	    	$result = $this->keyValueFactory->create();
	    	if($code != null){
	    		$result->addFieldToFilter('code', $code);
	    	}
	    	return $result;
	    }
	    catch(Exception $ex){
	    	return $ex->getMessage();
	    }
    }
}