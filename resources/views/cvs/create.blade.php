@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Create New CV</h1>

    <div class="card mb-4">
        <div class="card-header">CV Details</div>
        <div class="card-body">
            <form method="POST" action="{{ route('cvs.store') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Summary</label>
                    <textarea name="summary" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-success">Create CV</button>
            </form>
        </div>
    </div>

    <h2 class="mb-3">Add Sections to Your CV</h2>

    {{-- Experience --}}
    <div class="card mb-4">
        <div class="card-header">Add Experience</div>
        <div class="card-body">
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
                <button type="submit" class="btn btn-secondary">Add Experience</button>
            </form>
        </div>
    </div>

    {{-- Education --}}
    <div class="card mb-4">
        <div class="card-header">Add Education</div>
        <div class="card-body">
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
                <button type="submit" class="btn btn-secondary">Add Education</button>
            </form>
        </div>
    </div>

    {{-- Skill --}}
    <div class="card mb-4">
        <div class="card-header">Add Skill</div>
        <div class="card-body">
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
                <button type="submit" class="btn btn-secondary">Add Skill</button>
            </form>
        </div>
    </div>

    {{-- Language --}}
    <div class="card mb-4">
        <div class="card-header">Add Language</div>
        <div class="card-body">
            <form method="POST" action="{{ route('languages.store',['cv' => $cv->id]) }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Language</label>
                    <input type="text" name="language" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Proficiency Level</label>
                    <input type="text" name="level" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-secondary">Add Language</button>
            </form>
        </div>
    </div>

    {{-- Certification --}}
    <div class="card mb-4">
        <div class="card-header">Add Certification</div>
        <div class="card-body">
            <form method="POST" action="{{ route('certifications.store',['cv' => $cv->id]) }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Certification Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Issuing Organization</label>
                    <input type="text" name="organization" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Issue Date</label>
                    <input type="date" name="issue_date" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Expiration Date</label>
                    <input type="date" name="expiration_date" class="form-control">
                </div>
                <button type="submit" class="btn btn-secondary">Add Certification</button>
            </form>
        </div>
    </div>
</div>
@endsection
