<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class DashboardController extends Controller
{
    public function index()
    {
        $data['title'] = "Dashboard";
        return view('admin.index');
    }

    public function profile()
    {
        $data['title'] = 'My Profile';
        $profile = User::first();

        return view('admin.profile', compact('profile'), $data);
    }

    public function edit_profile(Request $request, $id)
    {
        $profile = User::find($id);

            if (!$profile) {
                return response()->json([
                    'message' => 'Data not found'
                ], 404);
            }
    
                $profile->name = $request->name;
                $profile->email = $request->email;
    
                $profile->save();

            return redirect()
                ->route('profile')
                ->with('success', 'Profile berhasil diperbarui.');
    }
}
