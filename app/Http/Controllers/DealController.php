<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Common\IZohoAPI;

class DealController extends Controller
{
    public function __construct(IZohoAPI $zohoAPI)
    {
        $this->middleware('zoho_access_token');
        $this->zohoAPI = $zohoAPI;
    }

    public function create()
    {
        return view('deal.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'Owner' => 'required',
            'Deal_Name' => 'required',
            'Account_Name' => 'required',
            'Closing_Date' => 'required',
            'Stage' => 'required',
        ]);
        $avaliable_fields = ['Owner', 'Deal_Name', 'Account_Name', 'Closing_Date', 'Stage', 'Contact_Name', 'Type', 'Description', 'Amount', 'Next_Step', 'Lead_Source'];
        $fields = $this->filterFields($request->post(), $avaliable_fields);

        $this->zohoAPI->inizialize();
        $response = $this->zohoAPI->createModuleRecord("Deals", $fields);
        dd($response);
        return view('success', ['response' => $response]);
    }

    private function filterFields($fields, $avaliable_fields)
    {
        $filterd_fields = array();
        foreach ($fields as $key => $value) {
            if (in_array($key, $avaliable_fields)) $filterd_fields[$key] = $value;

        }
        return $filterd_fields;
    }
}
