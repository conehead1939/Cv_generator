<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers;

use App\Models\CV;
use App\Models\Certification;
use Illuminate\Http\Request;

class CertificationController extends Controller
{
    public function store(Request $request, CV $cv)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'issuer' => 'required|string',
            'date_obtained' => 'nullable|date',
            'description' => 'nullable|string',
        ]);

        $cv->certifications()->create($data);
        return back()->with('success', 'Certification added.');
    }

    public function update(Request $request, CV $cv, Certification $certification)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'issuer' => 'required|string',
            'date_obtained' => 'nullable|date',
            'description' => 'nullable|string',
        ]);

        $certification->update($data);
        return back()->with('success', 'Certification updated.');
    }

    public function destroy(CV $cv, Certification $certification)
    {
        $certification->delete();
        return back()->with('success', 'Certification deleted.');
    }
}

