<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudyPack;
use App\Models\ClassModel;
use App\Models\Package;
use App\Models\Checkout;

class StudyPackController extends Controller
{
    /**
     * Display list of Study Packs available on the portal
     */
    public function index()
    {
        $studyPacks = StudyPack::where('is_published', true)->orderBy('id', 'asc')->get();
        $userId = auth()->id();
        $userName = auth()->user()->name ?? null;
        $isAdmin = auth()->user()->usertype === 'admin';

        $userApprovals = [];
        $userPendings = [];

        if (auth()->check()) {
            foreach ($studyPacks as $pack) {
                $classId = $pack->class_id;
                $userApprovals[$pack->id] = $isAdmin || Checkout::where('status', 'approved')
                    ->whereRaw("CONCAT(',', REPLACE(class_id, ' ', ''), ',') LIKE ?", ['%,' . $classId . ',%'])
                    ->where(function($q) use ($userId, $userName) {
                        $q->where('user_id', $userId);
                        if ($userName) {
                            $q->orWhere('student_name', $userName);
                        }
                    })
                    ->exists();

                $userPendings[$pack->id] = Checkout::where('status', 'pending')
                    ->whereRaw("CONCAT(',', REPLACE(class_id, ' ', ''), ',') LIKE ?", ['%,' . $classId . ',%'])
                    ->where(function($q) use ($userId, $userName) {
                        $q->where('user_id', $userId);
                        if ($userName) {
                            $q->orWhere('student_name', $userName);
                        }
                    })
                    ->exists();
            }
        }

        return view('studypack.index', compact('studyPacks', 'userApprovals', 'userPendings'));
    }

    /**
     * Show the detailed competency-based Study Pack video page
     * Requires the student to have an approved purchase (or be admin)
     */
    public function show($id = null)
    {
        if ($id) {
            $studyPack = is_numeric($id) 
                ? StudyPack::where('id', $id)->orWhere('class_id', $id)->firstOrFail()
                : StudyPack::where('slug', $id)->firstOrFail();
        } else {
            $studyPack = StudyPack::where('is_published', true)->firstOrFail();
        }

        $userId = auth()->id();
        $userName = auth()->user()->name ?? null;
        $classId = $studyPack->class_id;
        $isAdmin = auth()->user()->usertype === 'admin';

        // Check if user has approved payment specifically for this study pack
        $hasApproved = $isAdmin || Checkout::where('status', 'approved')
            ->whereRaw("CONCAT(',', REPLACE(class_id, ' ', ''), ',') LIKE ?", ['%,' . $classId . ',%'])
            ->where(function($q) use ($userId, $userName) {
                $q->where('user_id', $userId);
                if ($userName) {
                    $q->orWhere('student_name', $userName);
                }
            })
            ->exists();

        // If not approved, show the restriction purchase page
        if (!$hasApproved) {
            $hasPending = Checkout::where('status', 'pending')
                ->whereRaw("CONCAT(',', REPLACE(class_id, ' ', ''), ',') LIKE ?", ['%,' . $classId . ',%'])
                ->where(function($q) use ($userId, $userName) {
                    $q->where('user_id', $userId);
                    if ($userName) {
                        $q->orWhere('student_name', $userName);
                    }
                })
                ->exists();

            return view('studypack.restricted', compact('studyPack', 'hasPending'));
        }

        return view('studypack.show', compact('studyPack'));
    }
}
