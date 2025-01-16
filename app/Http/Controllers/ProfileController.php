<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('profile.index');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::user()->id,
            'current_password' => 'nullable|required_with:new_password',
            'new_password' => 'nullable|min:8|max:12|required_with:current_password',
            'password_confirmation' => 'nullable|min:8|max:12|required_with:new_password|same:new_password'
        ]);


        $user = User::findOrFail(Auth::user()->id);
        $user->name = $request->input('name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        if (!is_null($request->input('current_password'))) {
            if (Hash::check($request->input('current_password'), $user->password)) {
                $user->password = $request->input('new_password');
            } else {
                return redirect()->back()->withInput();
            }
        }
        $user->save();
        if (
            $request->has('alamat') &&
            $request->has('tempat_lahir') &&
            $request->has('tanggal_lahir') &&
            $request->has('tempat_lahir') &&
            $request->has('telepon') &&
            $request->has('tahun_lulus') &&
            $request->has('jenis_kelamin')
        ) {
            Alumni::updateOrCreate(
                [
                    'user_id' => $user->id
                ],
                [
                    'user_id' => $user->id,
                    'alamat' => $request->alamat,
                    'telepon' => $request->telepon,
                    'jenis_kelamin' => $request->jenis_kelamin,
                    'tempat_lahir' => $request->tempat_lahir,
                    'tanggal_lahir' => $request->tanggal_lahir,
                    'tahun_lulus' => $request->tahun_lulus,
                ]
            );
        }

        return redirect()->route('profile')->withSuccess('Profile updated successfully.');
    }
}
