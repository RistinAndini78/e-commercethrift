<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Membuat instance controller ProfileController.
     */
    public function __construct()
    {
        // Memastikan hanya pengguna yang terautentikasi yang dapat mengakses profil
        $this->middleware('auth');
    }

    /**
     * Menampilkan profil pengguna yang sedang terautentikasi.
     *
     * @return \Illuminate\View\View
     */
    public function show_profile()
    {
        // Mengambil informasi pengguna yang terautentikasi
        $user = Auth::user();

        // Menampilkan halaman dengan informasi profil pengguna
        return view('show_profile', compact('user'));
    }

    /**
     * Mengedit profil pengguna yang sedang terautentikasi.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit_profile(Request $request)
    {
        // Validasi data yang diterima dari formulir pengeditan profil
        $request->validate([
            'name' => 'required',
            'password' => 'required|min:8|confirmed'
        ]);

        // Mengambil informasi pengguna yang terautentikasi
        $user = Auth::user();

        // Memperbarui nama dan password pengguna sesuai dengan data yang diterima
        $user->update([
            'name' => $request->name,
            'password' => Hash::make($request->password)
        ]);

        // Redirect kembali ke halaman sebelumnya
        return Redirect::back();
    }
}
