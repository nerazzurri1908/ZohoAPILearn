<?php


namespace App\Http\Common;

interface IZohoAPI
{
    public function inizialize();

    public function createBulkReadJob($moduleAPIName,$fieldsApiNames,$callbackInfo = [],$page = 1);
    public function readJobDetails($id);
    public function downloadJobResult($id);

    public function createModuleRecord($moduleAPIName,$fields);
}
