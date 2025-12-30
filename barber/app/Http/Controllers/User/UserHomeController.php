<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Page;

class UserHomeController extends Controller
{
    /**
     * Dashboard User
     */
    public function index()
    {
        $about = Page::where('PageType', 'aboutus')->get();
        $user = Auth::user();

        // Invoice History User
        $invoices = DB::table('users')
            ->join('tblinvoice', 'users.id', '=', 'tblinvoice.Userid')
            ->select(
                'users.nama',
                'users.number',
                'tblinvoice.BillingId',
                DB::raw('DATE(tblinvoice.PostingDate) as invoicedate')
            )
            ->where('users.id', $user->id)
            ->orderByDesc('tblinvoice.ID')
            ->distinct()
            ->get();


        return view('user.dashboard', compact('user', 'invoices', 'about'));
    }

    /**
     * Proses Contact
     */
    public function contact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'pesan' => 'required|string|max:500',
        ]);

        DB::table('contacts')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'pesan' => $request->pesan,
            'created_at' => now(),
        ]);

        return redirect()->back()->with('info', 'Pesan berhasil dikirim');
    }

    /**
     * Update Profile User
     */
    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
        ]);

        $user = Auth::user();

        DB::table('users')
            ->where('id', $user->id)
            ->update([
                'nama' => $request->name,
                'updated_at' => now(),
            ]);

        return redirect()->back()->with('info', 'Profile berhasil diperbarui');
    }

    /**
     * Detail Invoice
     */
    public function invoiceDetail($billingId)
    {
        $invoice = DB::table('tblinvoice')
            ->where('BillingId', $billingId)
            ->first();

        if (!$invoice) {
            abort(404);
        }

        return view('user.invoice-detail', compact('invoice'));
    }
}
