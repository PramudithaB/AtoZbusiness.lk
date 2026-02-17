<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Classes;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index()
    {
        $classes = Classes::with(['package', 'lessons'])->get();
        return response()->json($classes);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'package_id' => 'nullable|exists:packages,id',
        ]);

        $class = Classes::create($validated);
        return response()->json($class, 201);
    }

    public function update(Request $request, $id)
    {
        $class = Classes::findOrFail($id);
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'package_id' => 'nullable|exists:packages,id',
        ]);

        $class->update($validated);
        return response()->json($class);
    }

    public function destroy($id)
    {
        $class = Classes::findOrFail($id);
        $class->delete();
        return response()->json(['message' => 'Class deleted successfully']);
    }
}
