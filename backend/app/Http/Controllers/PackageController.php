<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;


class PackageController extends Controller
{
    public function index()
    {
        return Package::with('classRoom')->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'class_id' => 'required|exists:class_rooms,id',
            'package_name' => 'required|string',
            'price' => 'required|numeric',
            'note' => 'nullable|string'
        ]);

        Package::create($data);
        return response()->json(['message' => 'Package created']);
    }

    public function update(Request $request, $id)
    {
        $package = Package::findOrFail($id);

        $package->update($request->validate([
            'class_id' => 'required|exists:class_rooms,id',
            'package_name' => 'required|string',
            'price' => 'required|numeric',
            'note' => 'nullable|string'
        ]));

        return response()->json(['message' => 'Package updated']);
    }

    public function destroy($id)
    {
        Package::findOrFail($id)->delete();
        return response()->json(['message' => 'Package deleted']);
    }
}