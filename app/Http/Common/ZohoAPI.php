<?php


namespace App\Http\Common;

use App\Http\Common\IZohoAPI;
use Illuminate\Http\Request;
use zcrmsdk\crm\bulkcrud\ZCRMBulkCallBack;
use zcrmsdk\crm\bulkcrud\ZCRMBulkQuery;
use zcrmsdk\crm\setup\restclient\ZCRMRestClient;
use zcrmsdk\crm\crud\ZCRMRecord;

class ZohoAPI implements IZohoAPI
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }


    public function inizialize()
    {
        $configuration = $this->request->session()->get('configuration');
        ZCRMRestClient::initialize($configuration);
    }


    public function createBulkReadJob($moduleAPIName, $fieldsApiNames, $callbackInfo = [], $page = 1)
    {
        $restClient = ZCRMRestClient::getInstance();
        $bulkReadrecordIns = $restClient->getBulkReadInstance($moduleAPIName, null);
        $query = ZCRMBulkQuery::getInstance();

        $query->setFields($fieldsApiNames);
        $query->setPage($page);

        $bulkReadrecordIns->setQuery($query);
        if (!empty($callbackInfo)) {
            $callBack = ZCRMBulkCallBack::GetInstance();
            $callBack->setUrl($callbackInfo['url']);
            $callBack->setMethod($callbackInfo['http_method']);
            $bulkReadrecordIns->setCallBack($callBack);
        }
        return $bulkReadrecordIns->createBulkReadJob();
    }


    public function readJobDetails($id)
    {
        $record = ZCRMRestClient::getInstance()->getBulkReadInstance(null, $id);
        return $record->getBulkReadJobDetails();
    }


    public function downloadJobResult($id)
    {
        $record = ZCRMRestClient::getInstance()->getBulkReadInstance(null, $id);
        return $record->downloadBulkReadResult();
    }

    public function createModuleRecord($moduleAPIName, $fields)
    {
        $record = ZCRMRecord::getInstance($moduleAPIName, NULL);
        $this->populateRecord($fields, $record);
        return $record->create();
    }

    private function populateRecord($fields, $record)
    {
        foreach ($fields as $key => $value) {
            $record->setFieldValue($key, $value);
        }
    }
}
