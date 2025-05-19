<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Generated CV</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; line-height: 1.6; }
        h1, h2, h3 { color: #333; }
        .section { margin-bottom: 20px; }
        .section h3 { margin-bottom: 5px; border-bottom: 1px solid #ccc; padding-bottom: 3px; }
    </style>
</head>
<body>

    <h1>{{ $cv->title }}</h1>
    <p>{{ $cv->summary }}</p>

    <div class="section">
        <h3>Experience</h3>
        @foreach($cv->experiences as $exp)
            <p><strong>{{ $exp->position }}</strong> at {{ $exp->company }} ({{ $exp->start_date }} - {{ $exp->end_date ?? 'Present' }})</p>
            <p>{{ $exp->description }}</p>
        @endforeach
    </div>

    <div class="section">
        <h3>Education</h3>
        @foreach($cv->educations as $edu)
            <p><strong>{{ $edu->degree }}</strong> - {{ $edu->school }} ({{ $edu->start_date }} - {{ $edu->end_date ?? 'Present' }})</p>
            <p>{{ $edu->description }}</p>
        @endforeach
    </div>

    <div class="section">
        <h3>Skills</h3>
        <ul>
            @foreach($cv->skills as $skill)
                <li>{{ $skill->name }} - {{ $skill->level }}</li>
            @endforeach
        </ul>
    </div>

    <div class="section">
        <h3>Languages</h3>
        <ul>
            @foreach($cv->languages as $lang)
                <li>{{ $lang->language }} - {{ $lang->level }}</li>
            @endforeach
        </ul>
    </div>

    <div class="section">
        <h3>Certifications</h3>
        @foreach($cv->certifications as $cert)
            <p><strong>{{ $cert->name }}</strong> by {{ $cert->organization }} ({{ $cert->issue_date }} - {{ $cert->expiration_date ?? 'N/A' }})</p>
        @endforeach
    </div>

</body>
</html>
