@extends('layouts.app')

@section('content')
    <h1>{{ $cv->title }}</h1>
    <p>{{ $cv->summary }}</p>

    <a href="{{ route('cvs.edit', $cv) }}">Edit CV</a>

    <hr>
    <h3>Experiences</h3>
    <ul>
        @foreach($cv->experiences as $exp)
            <li>{{ $exp->position }} at {{ $exp->company }}</li>
        @endforeach
    </ul>
    <a href="{{ route('experiences.create', $cv) }}">Add Experience</a>

    <!-- Repeat for education, skills, languages, certifications -->
@endsection