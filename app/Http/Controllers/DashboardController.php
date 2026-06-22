<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Page;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $services = Service::all();
        $locations = Page::where('PageType', 'location')->get();
        $aboutUsPage = DB::table('tblpage')->where('PageType', 'aboutus')->first();
        $about = Page::where('PageType', 'aboutus')->first();
        return view('dashboard', [
            'services' => $services,
            'locations' => $locations,
            'aboutUsPage' => $about,
            'about' => $about,
        ]);
    }
}
