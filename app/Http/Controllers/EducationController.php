<?php
namespace App\Http\Controllers;

use App\Models\CV;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function store(Request $request, CV $cv)
    {
        $data = $request->validate([
            'institution' => 'required|string',
            'degree' => 'required|string',
            'field' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
        ]);

        $cv->education()->create($data);
        return back()->with('success', 'Education added.');
    }

    public function update(Request $request, CV $cv, Education $education)
    {
        $data = $request->validate([
            'institution' => 'required|string',
            'degree' => 'required|string',
            'field' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
        ]);

        $education->update($data);
        return back()->with('success', 'Education updated.');
    }

    public function destroy(CV $cv, Education $education)
    {
        $education->delete();
        return back()->with('success', 'Education deleted.');
    }
}
