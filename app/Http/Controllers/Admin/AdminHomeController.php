<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Invoice;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AdminHomeController extends Controller
{
    /**
     * Menggantikan admin/index.php (Menampilkan Dashboard dengan statistik)
     */
    public function index()
    {
        return view('admin.dashboard', [
            'totalServices' => Service::count(),
            'totalCustomers' => User::count(),
            'totalInvoices' => Invoice::count(),

        ]);
    }

}