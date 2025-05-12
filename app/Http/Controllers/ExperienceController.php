<?php

namespace App\Http\Controllers;

use App\Models\CV;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function store(Request $request, CV $cv)
    {
        $data = $request->validate([
            'company' => 'required|string',
            'position' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'description' => 'nullable|string',
        ]);

        $cv->experiences()->create($data);
        return back()->with('success', 'Experience added.');
    }

    public function update(Request $request, CV $cv, Experience $experience)
    {
        $data = $request->validate([
            'company' => 'required|string',
            'position' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'description' => 'nullable|string',
        ]);

        $experience->update($data);
        return back()->with('success', 'Experience updated.');
    }

    public function destroy(CV $cv, Experience $experience)
    {
        $experience->delete();
        return back()->with('success', 'Experience deleted.');
    }
}
