<?php

namespace App\Http\Controllers;

use App\Models\ClassRoom;
use Illuminate\Http\Request;

class ClassRoomController extends Controller
{
    public function index()
    {
        return ClassRoom::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'class_name' => 'required',
            'description' => 'required',
            'month' => 'required',
            'teacher_name' => 'required',
            'time' => 'required',
        ]);

        return ClassRoom::create($data);
    }

    public function show($id)
    {
        return ClassRoom::findOrFail($id);
    }

   public function update(Request $request, $id) {
    $class = ClassModel::findOrFail($id);
    $class->update($request->all());
    return response()->json($class);
}


    public function destroy($id)
    {
        ClassRoom::destroy($id);
        return response()->json(['message' => 'Deleted']);
    }
}
