<?php

namespace App\Http\Controllers\api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\api;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class ApiAuthController extends Controller
{
    public function register(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'jk' => 'required',
            'role_id' => 'required',
        ]);

        // simpan data ke database
        $data = new User();
        $data->name = $validated['nama'];
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->no_hp = $request->no_hp;
        $data->alamat = $request->alamat;
        $data->jk = $request->jk;
        $data->role_id = $request->jk;
        $data->save();

        // kirim response
        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil disimpan'
        ]);
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
        $token = $user->createToken('user token')->plainTextToken;
        return response()->json([
            'success' => true,
            'message' => 'Login berhasil',
            'data' => $token,
            'user' => $user,
        ]);
    }
    public function me(Request $request)
    {
        return response()->json(Auth::user());
    }
    public function barang()
    {
        $siswa = DB::select("SELECT * FROM barang");

            if ($siswa != false) {
            return response()->json([
            'success' => true,
            'message' => 'Data tersedia',
            'data' => $siswa
            ], Response::HTTP_OK);
            } else {
            return response()->json([
            'success' => false,
            'message' => 'Data tidak tersedia',
            'data' => $siswa
            ], Response::HTTP_OK);
            }
    }
   
}
