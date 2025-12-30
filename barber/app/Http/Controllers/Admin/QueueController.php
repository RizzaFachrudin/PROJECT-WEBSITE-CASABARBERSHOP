<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QueueController extends Controller
{
    public function index()
    {
        $queues = DB::table('tblinvoice')
            ->whereDate('PostingDate', now())
            ->whereIn('Status', ['waiting', 'process'])
            ->orderBy('ID')
            ->get();

        return view('admin.queue.index', compact('queues'));
    }
}
