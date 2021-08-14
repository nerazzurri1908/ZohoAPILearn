<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Common\IZohoAPI;

class JobController extends Controller
{
    protected $zohoAPI;

    public function __construct(IZohoAPI $zohoAPI)
    {
        $this->middleware('zoho_access_token');
        $this->zohoAPI = $zohoAPI;
    }

    public function create()
    {
        return view('job.create');
    }


    public function store(Request $request)
    {
        $page = intval($request->input('page'));
        if ($page < 1) $page = 1;

        $fields = array();// List of Field API Names
        array_push($fields, "Owner");
        array_push($fields, "Account_Name");
        array_push($fields, "Contact_Name");
        array_push($fields, "Type");
        array_push($fields, "Description");
        array_push($fields, "Deal_Name");
        array_push($fields, "Amount");
        array_push($fields, "Next_Step");
        array_push($fields, "Stage");
        array_push($fields, "Lead_Source");
        array_push($fields, "Closing_Date");

        $this->zohoAPI->inizialize();
        $records = $this->zohoAPI->createBulkReadJob(
            "Deals",
            $fields,
            [],
            $page
        );

        return view('success', ['response' => $records]);
    }


    public function details()
    {
        return view('job.details');
    }


    public function detailsPost(Request $request)
    {
        $this->validate($request, [
            'jobId' => 'required',
        ]);
        $jobId = $request->get('jobId');

        $this->zohoAPI->inizialize();
        $response = $this->zohoAPI->readJobDetails($jobId);
        $read = $response->getData();
        return view('success', ['response' => $read->getState() . ' ' . $read->getCreatedTime()]);
    }


    public function result()
    {
	return view('job.result');
    }


    public function resultPost(Request $request)
    {
        $this->validate($request, [
            'jobId' => 'required',
        ]);
        $jobId = $request->get('jobId');
        $filePath = base_path();

        $this->zohoAPI->inizialize();
        $response = $this->zohoAPI->downloadJobResult($jobId);

        $fp = fopen($filePath . $response->getFileName(), "w"); // $filePath - absolute path where downloaded file has to be stored.
        $str = "HTTP Status Code:" . $response->getHttpStatusCode();
        $str .= "<br>File Name:" . $response->getFileName();
        $str .= "<br>File Full path:" . $filePath . $response->getFileName();
        $stream = $response->getFileContent();
        fputs($fp, $stream);
        fclose($fp);
        return view('success', ['response' => $str]);
    }
}
