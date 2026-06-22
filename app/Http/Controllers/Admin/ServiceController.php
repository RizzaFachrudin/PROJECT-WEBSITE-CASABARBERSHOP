<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    // index() -> manage service
    public function index()
    {
        $services = Service::all();
        return view('admin.service.index', compact('services'));
    }

    // create() -> add service
    public function create()
    {
        return view('admin.service.create');
    }

    // store() -> Proses add service
    public function store(Request $request)
    {
        $request->validate([
            'sername' => 'required|string|max:200',
            'serdesc' => 'required|string',
            'cost' => 'required|numeric',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $imageName = md5($request->file('image')->getClientOriginalName()) . time() . '.' . $request->file('image')->extension();
        $request->file('image')->move(public_path('admin/img'), $imageName);

        Service::create([
            'ServiceName' => $request->sername,
            'ServiceDescription' => $request->serdesc,
            'Cost' => $request->cost,
            'Image' => $imageName,
        ]);

        copy(
            public_path('admin/img/' . $imageName),
            public_path('main/img/' . $imageName)
        );

        return redirect()->route('admin.services.create')->with('success', 'berhasil menambahkan');
    }

    // edit() -> Tampilan edit-service.php
    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.service.edit', compact('service'));
    }

    // update() -> Proses edit-service.php
    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $request->validate([
            'sername' => 'required|string',
            'serdesc' => 'required|string',
            'cost' => 'required|numeric',
        ]);

        $service->update([
            'ServiceName' => $request->input('sername'),
            'ServiceDescription' => $request->input('serdesc'),
            'Cost' => $request->input('cost'),
        ]);

        return redirect()->route('admin.services.index')->with('success', 'Service has been Updated.');
    }
    // Tampilan update img
    public function editImage(Service $service)
    {
        return view('admin.service.image', compact('service'));
    }
    // Proses update img
    public function updateImage(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        // Hapus gambar lama 
        if ($service->Image && file_exists(public_path('admin/img/' . $service->Image))) {
            unlink(public_path('admin/img/' . $service->Image));
        }

        $imageName = md5($request->file('image')->getClientOriginalName()) . time() . '.' . $request->file('image')->extension();
        $request->file('image')->move(public_path('admin/img'), $imageName);

        $service->update(['Image' => $imageName]);

        copy(
            public_path('admin/img/' . $imageName),
            public_path('main/img/' . $imageName)
        );

        return redirect()->route('admin.services.index')->with('success', 'Service Image has been Updated.');
    }

    // Proses delete di manage service
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();
        return redirect()->route('admin.services.index')->with('success', 'Data Dihapus');
    }
}