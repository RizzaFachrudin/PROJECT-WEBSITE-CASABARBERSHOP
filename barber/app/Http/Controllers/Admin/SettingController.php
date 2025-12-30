<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Admin; // Pastikan Model Admin ada
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    // showSettings() -> Tampilan setting.php
    public function showSettings()
    {
        return view('admin.settings.index');
    }

    // updatePassword() -> Proses setting.php
    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'newpassword' => 'required|min:5',
            'renewpassword' => 'required|same:newpassword'
        ]);

        $admin = Auth::guard('admin')->user(); // Asumsi menggunakan guard admin

        if (Hash::check($request->password, $admin->password)) {
            $admin->password = Hash::make($request->newpassword);
            $admin->save();

            return back()->with('success', 'Password updated successfully.');
        } else {
            return back()->withErrors(['password' => 'Current password is incorrect.']);
        }
    }

    // showPage() -> Tampilan about-us.php & location.php
    public function showPage($type)
    {
        $page = Page::where('PageType', $type)->first();
        return view('admin.settings.page', compact('page', 'type'));
    }

    // updatePage() -> Proses about-us.php & location.php
    public function updatePage(Request $request, $type)
    {
        $page = Page::where('PageType', $type)->first();
        $page->update([
            'PageTitle' => $request->pagetitle,
            'PageDescription' => $request->pagedes
        ]);

        return back()->with('success', 'berhasil di update');
    }
}