<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function __construct()
    {

    }

    public function index(Request $request)
    {
        return view('config');
    }

    public function post(Request $request)
    {
        $this->validate($request,[
            'client_id'=>'required',
            'client_secret'=>'required',
            'user_email_id'=>'required',
            'redirect_uri'=>'required',
            'apiBaseUrl'=>'required',
            'accounts_url'=>'required',
        ]);


        $configuration = array(
            "client_id" => $request->client_id,
            "client_secret" => $request->client_secret,
            "redirect_uri" => $request->redirect_uri,
            "currentUserEmail" => $request->user_email_id,
            "apiBaseUrl" => $request->apiBaseUrl,
            "accounts_url" => $request->accounts_url,
            "host_address" => "localhost",
            "token_persistence_path" => base_path()
        );

        session(['configuration' => $configuration]);
        return view('success', ['response' => $configuration]);
    }
}
