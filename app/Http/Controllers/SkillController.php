<?php

namespace App\Http\Controllers;

use App\Models\CV;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function store(Request $request, CV $cv)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'level' => 'nullable|string',
        ]);

        $cv->skills()->create($data);
        return back()->with('success', 'Skill added.');
    }

    public function update(Request $request, CV $cv, Skill $skill)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'level' => 'nullable|string',
        ]);

        $skill->update($data);
        return back()->with('success', 'Skill updated.');
    }

    public function destroy(CV $cv, Skill $skill)
    {
        $skill->delete();
        return back()->with('success', 'Skill deleted.');
    }
}
