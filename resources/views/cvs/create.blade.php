@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Create New CV</h1>

    <form method="POST" action="{{ route('cvs.store') }}">
        @csrf

        {{-- CV Details --}}
        <div class="card mb-4">
            <div class="card-header">CV Details</div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Summary</label>
                    <textarea name="summary" class="form-control"></textarea>
                </div>
            </div>
        </div>

        {{-- Experience Section --}}
        <div class="card mb-4">
            <div class="card-header">Experience</div>
            <div class="card-body">
                <div class="mb-3">
                    <label>Company</label>
                    <input type="text" name="experiences[0][company]" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Position</label>
                    <input type="text" name="experiences[0][position]" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Start Date</label>
                    <input type="date" name="experiences[0][start_date]" class="form-control">
                </div>
                <div class="mb-3">
                    <label>End Date</label>
                    <input type="date" name="experiences[0][end_date]" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Description</label>
                    <textarea name="experiences[0][description]" class="form-control"></textarea>
                </div>
            </div>
        </div>

        {{-- Education Section --}}
        <div class="card mb-4">
            <div class="card-header">Education</div>
            <div class="card-body">
                <div class="mb-3">
                    <label>School</label>
                    <input type="text" name="educations[0][institution]" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Degree</label>
                    <input type="text" name="educations[0][degree]" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Start Date</label>
                    <input type="date" name="educations[0][start_date]" class="form-control">
                </div>
                <div class="mb-3">
                    <label>End Date</label>
                    <input type="date" name="educations[0][end_date]" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Description</label>
                    <textarea name="educations[0][description]" class="form-control"></textarea>
                </div>
            </div>
        </div>

        {{-- Skills --}}
        <div class="card mb-4">
            <div class="card-header">Skills</div>
            <div class="card-body">
                <div class="mb-3">
                    <label>Skill</label>
                    <input type="text" name="skills[0][name]" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Proficiency Level</label>
                    <input type="text" name="skills[0][level]" class="form-control">
                </div>
            </div>
        </div>

        {{-- Languages --}}
        <div class="card mb-4">
            <div class="card-header">Languages</div>
            <div class="card-body">
                <div class="mb-3">
                    <label>Language</label>
                    <input type="text" name="languages[0][name]" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Proficiency Level</label>
                    <input type="text" name="languages[0][proficiency]" class="form-control">
                </div>
            </div>
        </div>

        {{-- Certifications --}}
        <div class="card mb-4">
            <div class="card-header">Certifications</div>
            <div class="card-body">
                <div class="mb-3">
                    <label>Certification Name</label>
                    <input type="text" name="certifications[0][title]" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Organization</label>
                    <input type="text" name="certifications[0][issuer]" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Issue Date</label>
                    <input type="date" name="certifications[0][date_obtained]" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Description</label>
                    <textarea name="certifications[0][expiration_date]" class="form-control"></textarea>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Save Full CV</button>
    </form>
</div>
@endsection
