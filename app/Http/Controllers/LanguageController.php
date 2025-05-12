<?php
namespace App\Http\Controllers;

use App\Models\CV;
use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function store(Request $request, CV $cv)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'proficiency' => 'required|string',
        ]);

        $cv->languages()->create($data);
        return back()->with('success', 'Language added.');
    }

    public function update(Request $request, CV $cv, Language $language)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'proficiency' => 'required|string',
        ]);

        $language->update($data);
        return back()->with('success', 'Language updated.');
    }

    public function destroy(CV $cv, Language $language)
    {
        $language->delete();
        return back()->with('success', 'Language deleted.');
    }
}
