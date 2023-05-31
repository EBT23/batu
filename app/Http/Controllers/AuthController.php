<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        $data['title'] = "Dashboard";
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $client = new Client();
        $response = $client->request('POST', 'http://batu.dlhcode.com/api/login', [
			'form_params' => [
				'email' => $request->email,
				'password' => $request->password,
			]
		]);

        $body = $response->getBody();
		$data = json_decode($body, true);

        if (isset($data['data'])) {
			// Jika access_token ditemukan, simpan ke session dan redirect ke halaman dashboard
			session(['access_token' => $data['data']]);
			return redirect()->route('dashboard');
		} else {
			// Jika access_token tidak ditemukan, redirect kembali ke halaman login
			return redirect()->back();
		}
    }
}
