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
        $isAdmin = auth()->user()->usertype === 'admin';

        $userApprovals = [];
        $userPendings = [];

        if (auth()->check()) {
            foreach ($studyPacks as $pack) {
                $classId = $pack->class_id;

                // Strict payment verification: Only Admin OR Student with approved checkout for this study pack's class_id
                $hasApproved = false;
                if ($isAdmin) {
                    $hasApproved = true;
                } elseif ($userId && $classId) {
                    $hasApproved = Checkout::where('status', 'approved')
                        ->where('user_id', $userId)
                        ->whereRaw("CONCAT(',', REPLACE(class_id, ' ', ''), ',') LIKE ?", ['%,' . $classId . ',%'])
                        ->exists();
                }
                $userApprovals[$pack->id] = $hasApproved;

                $hasPending = false;
                if (!$hasApproved && $userId && $classId) {
                    $hasPending = Checkout::where('status', 'pending')
                        ->where('user_id', $userId)
                        ->whereRaw("CONCAT(',', REPLACE(class_id, ' ', ''), ',') LIKE ?", ['%,' . $classId . ',%'])
                        ->exists();
                }
                $userPendings[$pack->id] = $hasPending;
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
        $classId = $studyPack->class_id;
        $isAdmin = auth()->user()->usertype === 'admin';

        // Strict payment check: only admins or students who actually have an approved checkout
        $hasApproved = false;
        if ($isAdmin) {
            $hasApproved = true;
        } elseif ($userId && $classId) {
            $hasApproved = Checkout::where('status', 'approved')
                ->where('user_id', $userId)
                ->whereRaw("CONCAT(',', REPLACE(class_id, ' ', ''), ',') LIKE ?", ['%,' . $classId . ',%'])
                ->exists();
        }

        // If not approved, strictly show the locked / restriction page
        if (!$hasApproved) {
            $hasPending = false;
            if ($userId && $classId) {
                $hasPending = Checkout::where('status', 'pending')
                    ->where('user_id', $userId)
                    ->whereRaw("CONCAT(',', REPLACE(class_id, ' ', ''), ',') LIKE ?", ['%,' . $classId . ',%'])
                    ->exists();
            }

            return view('studypack.restricted', compact('studyPack', 'hasPending'));
        }

        return view('studypack.show', compact('studyPack'));
    }
}
