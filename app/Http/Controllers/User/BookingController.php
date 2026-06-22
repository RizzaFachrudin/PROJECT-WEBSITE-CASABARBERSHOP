<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Page;

class BookingController extends Controller
{
    /**
     * Form booking
     */
    public function create(Request $request)
    {
        $services = Service::all();
        $selectedServiceId = null;
        

        return view('user.booking', compact('services'));
    }

    /**
     * Simpan booking → langsung buat invoice (antrean)
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => 'required|string|max:100',
            'service_id' => 'required|exists:tblservices,ID',
        ]);
        $service = Service::findOrFail($request->service_id);

        DB::beginTransaction();

        try {
            // Ambil invoice terakhir dengan awalan 'A'
            $lastInvoice = DB::table('tblinvoice')
                ->where('BillingId', 'like', 'A%')
                ->orderBy('BillingId', 'desc')
                ->first();

            if ($lastInvoice) {
                // Ambil angka terakhir, misal dari 'A012' → 12
                $number = (int) substr($lastInvoice->BillingId, 1) + 1;
            } else {
                $number = 1; 
            }

            // Format jadi A001, A002, dst.
            $billingId = 'A' . str_pad($number, 3, '0', STR_PAD_LEFT);
            
            // Simpan ke tblinvoice (INI ANTREAN)
            DB::table('tblinvoice')->insert([
                'Userid' => null,
                'ServiceId' => $service->ID,
                'BillingId' => $billingId,
                'CustomerName' => $request->nama_pelanggan,
                'PostingDate' => now(),
                'Status' => 'waiting',
                'Paid' => 0,
                'Total' => $service->Cost * 1000,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::commit();

            return redirect()
                ->route('booking.confirm', $billingId)
                ->with('success', 'Booking berhasil, silakan tunggu antrean');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Halaman konfirmasi booking
     */
    public function confirm($billingId)
    {

        $invoice = DB::table('tblinvoice')
            ->join('tblservices', 'tblservices.ID', '=', 'tblinvoice.ServiceId')
            ->where('BillingId', $billingId)
            ->select(
                'tblinvoice.*',
                'tblservices.ServiceName',
                'tblservices.Cost'
            )
            ->first();

        if (!$invoice) {
            abort(404);
        }

        return view('user.confirm', compact('invoice'));
    }
}
