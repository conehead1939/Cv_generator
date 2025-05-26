@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Edit CV</h1>

    {{-- CV Info --}}
    <form method="POST" action="{{ route('cvs.update', ['cv' => $cv->id]) }}" class="mb-5">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" value="{{ $cv->title }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Summary</label>
            <textarea name="summary" class="form-control">{{ $cv->summary }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Update CV</button>
    </form>

    <hr>
    <h2 class="mb-4">Manage Sections</h2>

    {{-- Experience Section --}}
    <h3>Experience</h3>
    @if($experiences->isEmpty())
        <p>No experiences added yet. You can add a new experience below.</p>
    @else
        @foreach($experiences as $experience)
            <form method="POST" action="{{ route('experiences.update', ['cv' => $cv->id, 'experience' => $experience->id]) }}">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Company</label>
                    <input type="text" name="company" value="{{ $experience->company }}" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Position</label>
                    <input type="text" name="position" value="{{ $experience->position }}" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Start Date</label>
                    <input type="date" name="start_date" value="{{ $experience->start_date }}" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">End Date</label>
                    <input type="date" name="end_date" value="{{ $experience->end_date }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control">{{ $experience->description }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Update Experience</button>
            </form>
            <hr>
        @endforeach
    @endif

    {{-- Add New Experience --}}
    <h4>Add New Experience</h4>
    <form method="POST" action="{{ route('experiences.store', ['cv' => $cv->id]) }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Company</label>
            <input type="text" name="company" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Position</label>
            <input type="text" name="position" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Start Date</label>
            <input type="date" name="start_date" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">End Date</label>
            <input type="date" name="end_date" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Add Experience</button>
    </form>

    <hr>

    {{-- Education Section --}}
    <h3>Education</h3>
    @if($educations->isEmpty())
        <p>No education added yet. You can add a new education below.</p>
    @else
        @foreach($educations as $education)
            <form method="POST" action="{{ route('education.update', ['cv' => $cv->id, 'education' => $education->id]) }}">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">School Name</label>
                    <input type="text" name="school" value="{{ $education->school }}" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Degree</label>
                    <input type="text" name="degree" value="{{ $education->degree }}" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Start Date</label>
                    <input type="date" name="start_date" value="{{ $education->start_date }}" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">End Date</label>
                    <input type="date" name="end_date" value="{{ $education->end_date }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control">{{ $education->description }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Update Education</button>
            </form>
            <hr>
        @endforeach
    @endif

    {{-- Add New Education --}}
    <h4>Add New Education</h4>
    <form method="POST" action="{{ route('education.store', ['cv' => $cv->id]) }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">School Name</label>
            <input type="text" name="school" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Degree</label>
            <input type="text" name="degree" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Start Date</label>
            <input type="date" name="start_date" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">End Date</label>
            <input type="date" name="end_date" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Add Education</button>
    </form>

    <hr>

    {{-- Skills Section --}}
    <h3>Skills</h3>
    @if($skills->isEmpty())
        <p>No skills added yet. You can add a new skill below.</p>
    @else
        @foreach($skills as $skill)
            <form method="POST" action="{{ route('skills.update', ['cv' => $cv->id, 'skill' => $skill->id]) }}">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Skill</label>
                    <input type="text" name="name" value="{{ $skill->name }}" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Proficiency Level</label>
                    <input type="text" name="level" value="{{ $skill->level }}" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Update Skill</button>
            </form>
            <hr>
        @endforeach
    @endif

    {{-- Add New Skill --}}
    <h4>Add New Skill</h4>
    <form method="POST" action="{{ route('skills.store', ['cv' => $cv->id]) }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Skill</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Proficiency Level</label>
            <input type="text" name="level" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Add Skill</button>
    </form>

    <hr>

    {{-- Languages Section --}}
    <h3>Languages</h3>
    @if($languages->isEmpty())
        <p>No languages added yet. You can add a new language below.</p>
    @else
        @foreach($languages as $language)
            <form method="POST" action="{{ route('languages.update', ['cv' => $cv->id, 'language' => $language->id]) }}">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Language</label>
                    <input type="text" name="name" value="{{ $language->name }}" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Proficiency Level</label>
                    <input type="text" name="proficiency" value="{{ $language->proficiency }}" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Update Language</button>
            </form>
            <hr>
        @endforeach
    @endif

    {{-- Add New Language --}}
    <h4>Add New Language</h4>
    <form method="POST" action="{{ route('languages.store', ['cv' => $cv->id]) }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Language</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Proficiency Level</label>
            <input type="text" name="proficiency" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Add Language</button>
    </form>

    <hr>

    {{-- Certifications Section --}}
    <h3>Certifications</h3>
    @if($certifications->isEmpty())
        <p>No certifications added yet. You can add a new certification below.</p>
    @else
        @foreach($certifications as $certification)
            <form method="POST" action="{{ route('certifications.update', ['cv' => $cv->id, 'certification' => $certification->id]) }}">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Certification Name</label>
                    <input type="text" name="title" value="{{ $certification->title }}" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Issuing Organization</label>
                    <input type="text" name="issuer" value="{{ $certification->issuer }}" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Issue Date</label>
                    <input type="date" name="date_obtained" value="{{ $certification->date_obtained }}" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">description</label>
                    <textarea name="description" class="form-control"value="{{ $certification->expiration_date }}" class="form-control"> </textarea>
                </div>
                <button type="submit" class="btn btn-primary">Update Certification</button>
            </form>
            <hr>
        @endforeach
    @endif

    {{-- Add New Certification --}}
    <h4>Add New Certification</h4>
    <form method="POST" action="{{ route('certifications.store', ['cv' => $cv->id]) }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Certification Name</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Issuing Organization</label>
            <input type="text" name="issuer" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Issue Date</label>
            <input type="date" name="date_obtained" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Add Certification</button>
    </form>
</div>
@endsection
