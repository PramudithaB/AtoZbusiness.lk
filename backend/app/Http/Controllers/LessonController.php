<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\ClassRoom;


class LessonController extends Controller
{
    public function store(Request $request)
{
    $data = $request->validate([
'class_id' => 'required|exists:class_rooms,id',
        'link' => 'nullable|string',
        'notice' => 'nullable|string',
'lesson_type' => 'required|in:paid,nonpaid',
        'tute' => 'nullable|file|mimes:pdf,jpg,jpeg,png'
    ]);

    if ($request->hasFile('tute')) {
        $data['tute'] = $request->file('tute')->store('tutes', 'public');
    }

    Lesson::create($data);

    return response()->json(['message' => 'Lesson created']);
}
public function index()
{
    return Lesson::with('classRoom')->get();
}

public function destroy($id)
{
    Lesson::findOrFail($id)->delete();
    return response()->json(['message' => 'Lesson deleted']);
}


public function byClass($classId)
{
    return Lesson::where('class_id', $classId)->get();
}


public function paidLessons()
{
    $userId = auth()->id();

    // Check if user has an approved payment
    $hasPaid = Payment::where('user_id', $userId)
                      ->where('status', 'approved')
                      ->exists();

    if ($hasPaid) {
        // user paid → can view ALL lessons
        return Lesson::with('classRoom')->get();
    }

    // Not paid → only free lessons
    return Lesson::where('lesson_type', 'nonpaid')
                 ->with('classRoom')
                 ->get();
}




}
