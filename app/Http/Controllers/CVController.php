<?php

namespace App\Http\Controllers;

use App\Models\CV;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CVController extends Controller
{
    public function index()
    {
        $cvs = CV::where('user_id',Auth::user()->id)->get();
        return view('cvs.index', compact('cvs'));
    }

    public function create()
    {
        // Check if the user already has a CV
        $cv = CV::where('user_id', Auth::id())->first();
        return view('cvs.create', compact('cv'));
    }

    public function store(Request $request)
{
    //dd($request->all());

    $data = $request->validate([
        'title' => 'required|string|max:255',
        'summary' => 'nullable|string',

        // Experiences
        'experiences.*.company' => 'nullable|string',
        'experiences.*.position' => 'nullable|string',
        'experiences.*.start_date' => 'nullable|date',
        'experiences.*.end_date' => 'nullable|date|after_or_equal:experiences.*.start_date',
        'experiences.*.description' => 'nullable|string',

        // Educations
        'educations.*.institution' => 'nullable|string',
        'educations.*.degree' => 'nullable|string',
        'educations.*.start_date' => 'nullable|date',
        'educations.*.end_date' => 'nullable|date|after_or_equal:educations.*.start_date',
        'educations.*.description' => 'nullable|string',

        // Skills
        'skills.*.name' => 'nullable|string',
        'skills.*.level' => 'nullable|string',

        // Languages
        'languages.*.name' => 'nullable|string',
        'languages.*.proficiency' => 'nullable|string',

        // Certifications
        'certifications.*.name' => 'nullable|string',
        'certifications.*.organization' => 'nullable|string',
        'certifications.*.issue_date' => 'nullable|date',
        'certifications.*.expiration_date' => 'nullable|date|after_or_equal:certifications.*.issue_date',
    ]);

    // Create the CV
    $cv = CV::create([
        'user_id' => Auth::id(),
        'title' => $data['title'],
        'summary' => $data['summary'] ?? null,
    ]);

    // Store all sections dynamically if data exists
    $sections = ['experiences', 'educations', 'skills', 'languages', 'certifications'];

    foreach ($sections as $section) {
        if (!empty($data[$section])) {
            foreach ($data[$section] as $item) {
                if (array_filter($item)) { // Skip completely empty rows
                    $cv->{$section}()->create($item);
                }
            }
        }
    }

    return redirect()->route('cvs.index')->with('success', 'CV and related sections created.');
}

    public function show(CV $cv)
    {
        return view('cvs.show', compact('cv'));
    }

    public function edit(CV $cv)
    {
        $experiences = $cv->experiences?: collect();
        $skills = $cv->skills?: collect();
        $certifications = $cv->certifications?: collect();
        $languages = $cv->languages?: collect();
        $educations = $cv->educations?: collect();
        return view('cvs.edit', compact('cv', 'experiences', 'skills', 'certifications', 'languages', 'educations'));
    }

    public function update(Request $request, CV $cv)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'summary' => 'nullable|string',
        ]);

        $cv->update($data);
        return redirect()->route('cvs.index')->with('success', 'CV updated.');
    }

    public function destroy(CV $cv)
    {
        $cv->delete();
        return redirect()->route('cvs.index')->with('success', 'CV deleted.');
    }
}

