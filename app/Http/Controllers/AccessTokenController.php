<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use zcrmsdk\crm\setup\restclient\ZCRMRestClient;
use zcrmsdk\oauth\ZohoOAuth;

class AccessTokenController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {
        if (session('access_token')) dd(session('access_token'));
        return 'empty';
    }

    public function generate()
    {
        if (!$this->request->get('auth_token')) return redirect(route('home'));

        //oAuth
        $auth_token = $this->request->input('auth_token');

        if (!$auth_token) return redirect(route('home'));

        $config = session('configuration');
        ZCRMRestClient::initialize($config);
        $oAuthClient = ZohoOAuth::getClientInstance();
        $oAuthTokens = $oAuthClient->generateAccessToken($auth_token);
        session(['access_token' => $oAuthTokens]); //нужно еще сохранять и refrash token + expire
        return view('success', ['response' => $oAuthTokens]);
    }
}
