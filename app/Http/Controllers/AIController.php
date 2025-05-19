<?php
namespace App\Http\Controllers;

use App\Models\CV;
use App\Models\GeneratedCV;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;


class AIController extends Controller
{
    public function generate(CV $cv)
    {
        $cv->load(['experiences', 'educations', 'skills', 'languages', 'certifications']);

        $prompt = view('ai.prompt', compact('cv'))->render();

        $response = Http::withToken(env('OPENAI_API_KEY'))->post('https://api.openai.com/v1/chat/completions', [
            'model' => 'gpt-4o-mini', // or gpt-3.5-turbo for cheaper option
            'messages' => [
                ['role' => 'system', 'content' => 'Format the following data into a professional CV'],
                ['role' => 'user', 'content' => $prompt]
            ]
        ]);
        Log::debug('OpenAI API Response', ['response' => $response]);
        if (isset($responseData['error'])) {
            Log::error('OpenAI API returned error', ['error' => $responseData['error']]);
            return back()->withErrors(['api' => 'OpenAI error: ' . $responseData['error']['message']]);
        }else{
            if (!isset($responseData['choices']) || empty($responseData['choices'])) {
                $formatted = $response->json()['choices'][0]['message']['content'];
            }
        }

        return view('ai.preview', compact('cv', 'formatted'));
    }


    public function preview(Request $request, CV $cv)
    {
        // Validate inputs
        $validated = $request->validate([
            'template' => 'required|string',
            'formatted' => 'required|string',
        ]);
        

        $template ='ai.templates.'.$validated['template'];

        // Check if the Blade view exists
        

        // Render the HTML using the specified template
        $html = view($template, [
            'content' => $validated['formatted'],
            'cv' => $cv, // optional if template needs full CV data
        ])->render();

        // Generate PDF from HTML
        $pdf = Pdf::loadHTML($html);

        return $pdf->stream('cv-preview.pdf');
    }


 

public function save(Request $request, CV $cv)
{
    // Ensure the public/cvs directory exists
    $directory = public_path('generated_cvs');
    if (!File::exists($directory)) {
        File::makeDirectory($directory, 0775, true);
    }

    // Build file path
    $filePath = 'generated_cvs/generated_' . time() . '.pdf';

    // Render HTML from selected template
    $html = view('ai.templates.' . $request->template, [
        'content' => $request->formatted,
        'cv' => $cv,
    ])->render();

    // Generate and save PDF
    $pdf = PDF::loadHTML($html);
    $pdf->save(public_path($filePath));

    // Save record to database
    GeneratedCV::create([
        'cv_id' => $cv->id,
        'user_id' => Auth::id(),
        'file_path' => $filePath,
        'template' => $request->template,
    ]);

    return redirect()->route('cvs.index')->with('success', 'CV generated and saved.');
}

}

