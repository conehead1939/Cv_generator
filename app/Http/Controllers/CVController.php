<?php

namespace App\Http\Controllers;

use App\Models\CV;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CVController extends Controller
{
    public function index()
    {
        $cvs = CV::where('id',Auth::user()->id)->get();
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
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'summary' => 'nullable|string',
        ]);

        $data['user_id'] = Auth::id();
        CV::create($data);
        return redirect()->route('cvs.index')->with('success', 'CV created.');
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

