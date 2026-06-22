<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    /**
     * LIST INVOICE = LIST ANTREAN
     */
    public function index()
    {
        $invoices = DB::table('tblinvoice')
            ->leftJoin('users', 'users.id', '=', 'tblinvoice.Userid')
            ->join('tblservices', 'tblservices.ID', '=', 'tblinvoice.ServiceId')
            ->select(
                'tblinvoice.BillingId',
                DB::raw('COALESCE(users.nama, tblinvoice.CustomerName) as nama'),
                'tblservices.ServiceName',
                'tblinvoice.Status',
                'tblinvoice.Total',
                DB::raw('DATE(tblinvoice.PostingDate) as invoicedate')
            )
            ->orderBy('tblinvoice.ID', 'desc')
            ->get();


        return view('admin.invoice.index', compact('invoices'));
    }

    /**
     * DETAIL INVOICE
     */
    public function show($billingId)
    {
        $invoice = DB::table('tblinvoice')
            ->leftJoin('users', 'users.id', '=', 'tblinvoice.Userid')
            ->join('tblservices', 'tblservices.ID', '=', 'tblinvoice.ServiceId')
            ->where('BillingId', $billingId)
            ->select(
                'tblinvoice.*',
                'tblservices.ServiceName',
                DB::raw('COALESCE(users.nama, tblinvoice.CustomerName) as nama')
            )
            ->first();

        if (!$invoice) {
            abort(404); // invoice tidak ditemukan
        }

        return view('admin.invoice.show', compact('invoice'));
    }


    /**
     * UBAH STATUS → PROSES
     */
    public function process($billingId)
    {
        Invoice::where('BillingId', $billingId)
            ->update(['Status' => 'process']);

        return back()->with('success', 'Antrean sedang diproses');
    }

    /**
     * SELESAI + LUNAS
     */
    public function complete($billingId)
    {
        Invoice::where('BillingId', $billingId)
            ->update([
                'Status' => 'completed',
                'Paid' => 1
            ]);

        return back()->with('success', 'Pesanan selesai');
    }

    /**
     * CETAK STRUK
     */
    public function print($billingId)
    {
        $invoice = DB::table('tblinvoice')
            ->join('users', 'users.id', '=', 'tblinvoice.Userid')
            ->join('tblservices', 'tblservices.ID', '=', 'tblinvoice.ServiceId')
            ->where('tblinvoice.BillingId', $billingId)
            ->firstOrFail();

        return view('admin.invoice.print', compact('invoice'));
    }

    /**
     * HAPUS INVOICE
     */
    public function destroy($billingId)
    {
        Invoice::where('BillingId', $billingId)->delete();
        return redirect()
            ->route('admin.invoices.index')
            ->with('success', 'Invoice dihapus');
    }
}
