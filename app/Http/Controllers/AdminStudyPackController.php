<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudyPack;
use App\Models\ClassModel;
use App\Models\Package;
use Illuminate\Support\Str;

class AdminStudyPackController extends Controller
{
    /**
     * Display list of all study packs in Admin Panel
     */
    public function index()
    {
        $studyPacks = StudyPack::with(['classModel', 'package'])->orderBy('id', 'desc')->get();
        return view('admin.studypack.index', compact('studyPacks'));
    }

    /**
     * Show form to create a new study pack
     */
    public function create()
    {
        return view('admin.studypack.create');
    }

    /**
     * Store new study pack and automatically create matching Class & Package
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'grade' => 'required|string|max:100',
            'price' => 'required|integer|min:0',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'starter_template' => 'nullable|string|in:empty,business_studies',
        ]);

        // Generate unique slug
        $baseSlug = Str::slug($request->title) ?: 'study-pack';
        $slug = $baseSlug;
        $counter = 1;
        while (StudyPack::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $counter++;
        }

        // 1. Automatically create corresponding ClassModel
        $class = ClassModel::create([
            'className' => $request->title . ' (Study Pack)',
            'description' => $request->description ?: $request->subtitle,
            'teacherName' => 'Lasindu Senarath',
            'classTime' => 'Video Study Pack',
            'sessionCount' => 0,
            'month' => 'Study Pack',
        ]);

        // 2. Automatically create corresponding Package for Cart & Checkout
        Package::create([
            'class_id' => $class->id,
            'package_name' => $class->className,
            'description' => $request->description ?: $request->subtitle,
            'monthly_fee' => $request->price,
        ]);

        // 3. Optional Starter Curriculum
        $curriculum = [
            'g12' => [],
            'g13' => [],
        ];

        if ($request->starter_template === 'business_studies') {
            $bsPack = StudyPack::where('slug', 'business-studies')->first();
            if ($bsPack && !empty($bsPack->curriculum_data)) {
                $curriculum = $bsPack->curriculum_data;
            }
        } else {
            // Default empty starter structure with 1 sample topic
            $curriculum = [
                'g12' => [
                    [
                        'num' => 1,
                        'title' => 'පළමු ප්‍රධාන ඒකකය (මාතෘකාව)',
                        'subs' => [
                            ['num' => '1.1', 'desc' => 'පළමු උප මාතෘකාව / පාඩම', 'url' => ''],
                        ],
                    ],
                ],
                'g13' => [],
            ];
        }

        // 4. Create the StudyPack
        $studyPack = StudyPack::create([
            'class_id' => $class->id,
            'title' => $request->title,
            'slug' => $slug,
            'subtitle' => $request->subtitle,
            'description' => $request->description,
            'grade' => $request->grade,
            'price' => $request->price,
            'curriculum_data' => $curriculum,
            'is_published' => true,
        ]);

        return redirect()->route('admin.studypack.curriculum', $studyPack->id)
            ->with('success', 'Study Pack created successfully! You can now add topics and YouTube video links below.');
    }

    /**
     * Show form to edit Study Pack details and price
     */
    public function edit($id)
    {
        $studyPack = StudyPack::findOrFail($id);
        return view('admin.studypack.edit', compact('studyPack'));
    }

    /**
     * Update Study Pack details and sync price with Package
     */
    public function update(Request $request, $id)
    {
        $studyPack = StudyPack::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'grade' => 'required|string|max:100',
            'price' => 'required|integer|min:0',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'is_published' => 'nullable|boolean',
        ]);

        $studyPack->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'description' => $request->description,
            'grade' => $request->grade,
            'price' => $request->price,
            'is_published' => $request->has('is_published'),
        ]);

        // Sync with linked ClassModel and Package
        if ($studyPack->class_id) {
            $class = ClassModel::find($studyPack->class_id);
            if ($class) {
                $class->update([
                    'className' => $request->title . ' (Study Pack)',
                    'description' => $request->description,
                ]);
            }

            $package = Package::where('class_id', $studyPack->class_id)->first();
            if ($package) {
                $package->update([
                    'package_name' => $request->title . ' (Study Pack)',
                    'description' => $request->description,
                    'monthly_fee' => $request->price,
                ]);
            }
        }

        if ($request->input('action') === 'save_and_curriculum') {
            return redirect()->route('admin.studypack.curriculum', $studyPack->id)
                ->with('success', 'Study Pack details saved successfully! You can now manage video links and topics below.');
        }

        return redirect()->route('admin.studypack.index')
            ->with('success', 'Study Pack details updated successfully!');
    }

    /**
     * Show curriculum and YouTube video links editor
     */
    public function curriculum($id)
    {
        $studyPack = StudyPack::findOrFail($id);
        $curriculum = $studyPack->curriculum_data ?? ['g12' => [], 'g13' => []];
        return view('admin.studypack.curriculum', compact('studyPack', 'curriculum'));
    }

    /**
     * Save updated curriculum JSON from visual editor
     */
    public function updateCurriculum(Request $request, $id)
    {
        $studyPack = StudyPack::findOrFail($id);

        $curriculumJson = $request->input('curriculum_json');
        $curriculum = json_decode($curriculumJson, true);

        if (!is_array($curriculum)) {
            return back()->with('error', 'Invalid curriculum data format.');
        }

        $studyPack->curriculum_data = $curriculum;
        $studyPack->save();

        // Update sessionCount in class_models
        if ($studyPack->class_id) {
            ClassModel::where('id', $studyPack->class_id)->update([
                'sessionCount' => $studyPack->subtopics_count,
            ]);
        }

        return back()->with('success', 'Curriculum topics and YouTube video links updated successfully!');
    }

    /**
     * Delete a Study Pack
     */
    public function destroy($id)
    {
        $studyPack = StudyPack::findOrFail($id);

        if ($studyPack->class_id) {
            Package::where('class_id', $studyPack->class_id)->delete();
            ClassModel::where('id', $studyPack->class_id)->delete();
        }

        $studyPack->delete();

        return redirect()->route('admin.studypack.index')
            ->with('success', 'Study Pack deleted successfully.');
    }
}
