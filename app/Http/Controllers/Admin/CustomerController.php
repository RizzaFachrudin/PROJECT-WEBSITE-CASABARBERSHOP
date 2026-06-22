<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Service;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{

    public function index()
    {
        $customers = User::all();
        return view('admin.customers.index', compact('customers'));
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('admin.customers.index')->with('success', 'Customer has been deleted.');
    }

    public function createInvoice($userId)
    {
        $services = Service::all();
        $customer = User::findOrFail($userId);
        return view('admin.customers.add-invoice', compact('customer', 'services'));
    }

    public function storeInvoice(Request $request, $userId)
    {
        $request->validate([
            'sids' => 'required|array|min:1',
            'sids.*' => 'exists:tblservices,ID'
        ]);

        $invoiceId = mt_rand(100000000, 999999999);

        foreach ($request->sids as $serviceId) {
            Invoice::create([
                'Userid' => $userId,
                'ServiceId' => $serviceId,
                'BillingId' => $invoiceId
            ]);
        }

        return redirect()
            ->route('admin.invoices.index')
            ->with('success', 'Invoice berhasil dibuat');
    }
}